<!-- {{-- subscript --}} -->
<div class="py-5 bg-light mx-md-3 sec-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-lg-8  text-start">
                <h2 class="h2 fw-bold">ติดตามบทความใหม่ๆ ได้ที่นี่</h2>
            </div>
            <div class="col-lg-4 text-end">
                <a class="btn btn-primary" style="font-size: 20px" href="https://medium.com/samkhok">ดูบทความ</a>
            </div>
        </div>
        <!-- {{-- <form action="" class="row">
                <div class="col-md-8">
                    <div class="mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-4 d-grid">
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </div> --}} -->
        </form>
    </div>
</div>
<!-- {{-- footer --}} -->
<div class="site-footer py-4">
    <div class="container">
        <div class="row justify-content-center copyright">
            <div class="col-lg-7 text-center">
                <div class="" style="display: flex; justify-content: center;">
                    <div class="" style="margin: 10px;">
                        <a href2="https://geo.itunes.apple.com/us/app/whoscored-football-app/id940048063?mt=8">
                            <img alt="app store" src="https://d2zywfiolv4f83.cloudfront.net/img/appstore_en.png" width="135" height="40" loading="lazy">
                        </a>
                    </div>
                    <div class="" style="margin: 10px;">
                        <a href="https://play.google.com/store/apps/details?id=org.samkhok">
                            <img loading="lazy" alt="Get it on Google Play" src="https://d2zywfiolv4f83.cloudfront.net/img/googleplaystore_en.png" width="135" height="40">
                        </a>
                    </div>
                </div>
                <div class="widget">
                    <ul class="social list-unstyled">
                        <!-- {{-- <li><a href="#"><span class="fa fa-home"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-youtube-play"></span></a></li> --}} -->
                    </ul>
                </div>
                <div class="widget">
                    <p class="prompt">Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved
                    </p>
                    <!-- <div class="d-block">
                        <a href="#" class="m-2">Terms & Conditions</a>/
                        <a href="{{ url('/cookies-policy') }}" class="m-2">Cookies Policy</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div id="overlayer" style="opacity: -0.1; display: none;"></div>
    <div class="loader" style="opacity: -0.1; display: none;">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>



<?php include("./theme/script.php"); ?>
<script src="./assets/autocomplete/autocomplete.js"></script>
<script>
    function stripHtml(html) {
        let tmp = document.createElement("DIV");
        tmp.innerHTML = html;
        return tmp.textContent || tmp.innerText || "";
    }

    fetch("https://ckartisan.com/api/medium/feed/samkhok")
        .then((data) => (data.json()))
        .then((data) => {
            console.log(data);
            data = data.channel.item;
            data = data.map(function(item) {
                return {
                    "title": item.title,
                    "content": stripHtml(item.contentEncoded).replace(/[^ก-๛0-9\s]+/g, ""),
                    "link": item.link,
                };
            });
            autocomplete(document.getElementById("searchbox"), data);
        })
    // let countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
    // autocomplete(document.getElementById("searchbox"), data);    
</script>

<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/locale/th.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
<script>
    dayjs.locale('th'); // use loaded locale globally : Thailand
    dayjs.extend(window.dayjs_plugin_relativeTime);
</script>
<script>
    let ds = document.querySelectorAll("span.date");
    // console.log(ds);
    // console.log(dayjs.locale());
    console.log(dayjs().to(dayjs('1990-01-01')));
    ds.forEach(function(node) {
        let value = node.innerHTML;
        // console.log(dayjs(new Date()).locale('th').format('llll'));
        node.innerHTML = dayjs(new Date(value)).fromNow();
        // node.innerHTML =dayjs(new Date()).locale('th').toString();
    })
</script>