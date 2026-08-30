<?php
require_once __DIR__ . '/components/medium-service.php';
$all_feed = get_samkhok_medium_feed();
$raw_items = (isset($all_feed->channel->item) && is_array($all_feed->channel->item)) ? $all_feed->channel->item : [];

$categories = ["บทความพิเศษ", "ท่องเที่ยว", "วัฒนธรรม", "ความเชื่อ", "บุคคลสำคัญ", "การพัฒนาแพลตฟอร์ม", "สามโคก"];

foreach ($categories as $q) {
    $keywords = [];
    switch ($q) {
        case "ท่องเที่ยว":
            $keywords = ["ท่องเที่ยว", "travel", "วัด", "ตลาด", "เที่ยว"];
            break;
        case "วัฒนธรรม":
            $keywords = ["วัฒนธรรม", "culture", "ประเพณี", "รำพา", "หางหงส์", "ข้าวแช่", "วิถีชีวิต"];
            break;
        case "ความเชื่อ":
        case "ความคิด":
            $keywords = ["ความเชื่อ", "ความคิด", "thinking", "จุดลูกหนู", "ศรัทธา", "พิธี"];
            break;
        case "สามโคก":
        case "บทความพิเศษ":
            $keywords = ["สามโคก", "samkhok", "บทความพิเศษ"];
            break;
        case "บุคคลสำคัญ":
            $keywords = ["บุคคลสำคัญ", "vip", "ผู้ใหญ่", "นายเดชา", "วิสาหกิจ"];
            break;
        case "การพัฒนาแพลตฟอร์ม":
            $keywords = ["การพัฒนาแพลตฟอร์ม", "general", "แพลตฟอร์ม", "โครงการ"];
            break;
        default:
            $keywords = [$q];
            break;
    }
    
    $items = [];
    foreach ($raw_items as $item) {
        $matched = false;
        
        // Match category tags
        if (isset($item->category)) {
            $item_cats = is_array($item->category) ? $item->category : [$item->category];
            foreach ($item_cats as $cat) {
                $clean_cat = mb_strtolower(trim((string)$cat));
                foreach ($keywords as $kw) {
                    $clean_kw = mb_strtolower(trim($kw));
                    if ($clean_cat === $clean_kw || str_contains($clean_cat, $clean_kw)) {
                        $matched = true;
                        break 2;
                    }
                }
            }
        }
        
        // Match title or paragraph
        if (!$matched) {
            $title = mb_strtolower($item->title ?? '');
            $paragraph = mb_strtolower($item->first_paragraph ?? '');
            foreach ($keywords as $kw) {
                $clean_kw = mb_strtolower(trim($kw));
                if (str_contains($title, $clean_kw) || str_contains($paragraph, $clean_kw)) {
                    $matched = true;
                    break;
                }
            }
        }

        if ($matched) {
            $items[] = $item;
        }
    }

    echo "Category: '$q' -> Found " . count($items) . " items:\n";
    foreach ($items as $it) {
        echo "  - " . $it->title . "\n";
    }
    echo "\n";
}
