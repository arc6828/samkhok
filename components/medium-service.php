<?php
/**
 * Medium RSS Feed Parser & Caching Service for Sam Khok Website
 */

if (!function_exists('get_samkhok_medium_feed')) {

    function get_samkhok_medium_feed($tag = '', $ttl_seconds = 3600) {
        $clean_tag = trim($tag);
        $cache_dir = __DIR__ . '/../cache';
        
        if (!file_exists($cache_dir)) {
            @mkdir($cache_dir, 0755, true);
        }

        $cache_key = $clean_tag !== '' ? 'medium_tag_' . md5($clean_tag) : 'medium_latest';
        $cache_file = $cache_dir . '/' . $cache_key . '.json';

        // 1. Check if cache exists and is fresh
        if (file_exists($cache_file) && (time() - filemtime($cache_file) < $ttl_seconds)) {
            $cached_data = @file_get_contents($cache_file);
            if ($cached_data) {
                $decoded = json_decode($cached_data);
                if ($decoded && isset($decoded->channel->item)) {
                    return $decoded;
                }
            }
        }

        // 2. Build Medium RSS Feed URL
        if ($clean_tag !== '') {
            $medium_url = "https://medium.com/feed/samkhok/tagged/" . urlencode($clean_tag);
        } else {
            $medium_url = "https://medium.com/feed/samkhok";
        }

        // 3. Fetch RSS XML from Medium with User-Agent header
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36\r\nAccept: application/xml, text/xml, */*\r\n",
                "timeout" => 6
            ]
        ];
        $context = stream_context_create($opts);
        $xml_raw = @file_get_contents($medium_url, false, $context);

        if ($xml_raw !== false && !empty($xml_raw)) {
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($xml_raw, 'SimpleXMLElement', LIBXML_NOCDATA);
            
            if ($xml && isset($xml->channel->item)) {
                $items = [];
                foreach ($xml->channel->item as $item) {
                    $namespaces = $item->getNameSpaces(true);
                    
                    // Content & Creator
                    $content_encoded = '';
                    if (isset($namespaces['content'])) {
                        $content_encoded = (string)$item->children($namespaces['content'])->encoded;
                    }
                    
                    $creator = 'ทีมงานสามโคก';
                    if (isset($namespaces['dc'])) {
                        $creator = (string)$item->children($namespaces['dc'])->creator;
                    }

                    // Extract first image from content
                    $image_url = 'https://miro.medium.com/max/1400/1*v_-qDdjsr35MepgtUPOdvg.webp';
                    if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $content_encoded, $matches)) {
                        $image_url = $matches[1];
                    }

                    // Extract first paragraph / summary text
                    $plain_text = trim(strip_tags($content_encoded));
                    $plain_text = preg_replace('/\s+/', ' ', $plain_text);
                    $first_paragraph = mb_substr($plain_text, 0, 140);

                    // Extract Categories / Tags
                    $categories = [];
                    if (isset($item->category)) {
                        foreach ($item->category as $cat) {
                            $categories[] = (string)$cat;
                        }
                    }

                    $link = (string)$item->link;
                    $items[] = (object)[
                        'id' => md5($link),
                        'title' => (string)$item->title,
                        'link' => $link,
                        'pubDate' => (string)$item->pubDate,
                        'creator' => $creator,
                        'category' => $categories,
                        'image_url' => $image_url,
                        'first_paragraph' => $first_paragraph,
                        'contentEncoded' => $content_encoded
                    ];
                }

                $result = (object)[
                    'channel' => (object)[
                        'title' => (string)$xml->channel->title,
                        'link' => (string)$xml->channel->link,
                        'description' => (string)$xml->channel->description,
                        'item' => $items
                    ]
                ];

                // Write to cache file
                @file_put_contents($cache_file, json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
                return $result;
            }
        }

        // 4. Fallback: Return stale cache if available
        if (file_exists($cache_file)) {
            $stale_data = @file_get_contents($cache_file);
            if ($stale_data) {
                $decoded = json_decode($stale_data);
                if ($decoded && isset($decoded->channel->item)) {
                    return $decoded;
                }
            }
        }

        // 5. Empty fallback
        return (object)[
            'channel' => (object)[
                'title' => 'สามโคก',
                'link' => 'https://medium.com/samkhok',
                'description' => 'บทความสามโคก',
                'item' => []
            ]
        ];
    }
}

if (!function_exists('get_post_url')) {
    function get_post_url($item) {
        if (is_object($item)) {
            $id = $item->id ?? md5($item->link ?? $item->title ?? '');
            return "post.php?id=" . $id;
        }
        return "#";
    }
}

if (!function_exists('get_samkhok_article_by_id')) {
    function get_samkhok_article_by_id($query) {
        $clean_query = trim($query ?? '');
        $decoded_query = urldecode($clean_query);

        $match = function($item) use ($clean_query, $decoded_query) {
            $item_id = $item->id ?? md5($item->link ?? '');
            $item_short_id = substr($item_id, 0, 8);
            $item_link_md5 = md5($item->link ?? '');
            $item_link_short_md5 = substr($item_link_md5, 0, 8);
            $item_title = $item->title ?? '';
            $item_link = $item->link ?? '';

            if (
                $item_id === $clean_query ||
                $item_short_id === $clean_query ||
                $item_link_md5 === $clean_query ||
                $item_link_short_md5 === $clean_query ||
                $item_link === $clean_query ||
                $item_link === $decoded_query ||
                $item_title === $clean_query ||
                $item_title === $decoded_query ||
                ($decoded_query !== '' && str_contains(mb_strtolower($item_title), mb_strtolower($decoded_query)))
            ) {
                return true;
            }
            return false;
        };

        $cache_dir = __DIR__ . '/../cache';
        
        // 1. Search in cache files
        if (!empty($clean_query) && file_exists($cache_dir)) {
            $files = glob($cache_dir . '/*.json');
            foreach ($files as $file) {
                $data = json_decode(@file_get_contents($file));
                if (isset($data->channel->item) && is_array($data->channel->item)) {
                    foreach ($data->channel->item as $item) {
                        if ($match($item)) {
                            return $item;
                        }
                    }
                }
            }
        }

        // 2. Fetch fresh feed if not found in cache
        $latest = get_samkhok_medium_feed();
        if (isset($latest->channel->item) && is_array($latest->channel->item)) {
            if (!empty($clean_query)) {
                foreach ($latest->channel->item as $item) {
                    if ($match($item)) {
                        return $item;
                    }
                }
            }
            
            // If empty or still not found, return the first latest article as fallback
            if (isset($latest->channel->item[0])) {
                return $latest->channel->item[0];
            }
        }

        return null;
    }
}
