<?php

session_start();

if(isset($_GET['kill']))
{
    session_destroy();
    exit();
}

define('LOCAL', ($_SERVER['SERVER_ADDR'] === '127.0.0.1' AND !isset($_GET['save'])) ? 'localhost/' : '');

if(!isset($_SESSION['n'])) $_SESSION['n'] = $i;

$things = array(
    0 => array('◐', 'xn--61h.cf', 'xn--91h.cf'),
    1 => array('◓', 'xn--91h.cf', 'xn--71h.cf'),
    2 => array('◑', 'xn--71h.cf', 'xn--81h.cf'),
    3 => array('◒', 'xn--81h.cf', 'xn--61h.cf'),
);

$thing = $things[$i];

$r = '<!doctype html>';
$r .= '<html dir="ltr" lang="en">';
$r .= '<head>';
$r .= '<meta charset="utf-8">';
if($i !== 3) $r .= '<link rel="dns-prefetch" href="https://xn--81h.cf/">';
if($i !== 2) $r .= '<link rel="dns-prefetch" href="https://xn--71h.cf/">';
if($i !== 1) $r .= '<link rel="dns-prefetch" href="https://xn--91h.cf/">';
if($i !== 0) $r .= '<link rel="dns-prefetch" href="https://xn--61h.cf/">';
if(!isset($_GET['pause'])) $r .= '<meta http-equiv="Refresh" content="1; url=https://' . LOCAL . $thing[2] . '/">';
$r .= '<meta property="fb:admins" content="509248955">';
$r .= '<meta name="apple-mobile-web-app-capable" content="yes">';
$r .= '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">';
$r .= '<meta name="description" content="By Alexander Christiaan Jacob, 2012.">';
$r .= '<meta property="og:description" content="By Alexander Christiaan Jacob, 2012.">';
$r .= '<meta property="og:image" content="https://' . LOCAL . 'xn--61h.cf/image.jpg">';
$r .= '<meta property="og:image:height" content="240">';
$r .= '<meta property="og:image:width" content="240">';
$r .= '<meta property="og:title" content="' . $thing[0] . '.cf">';
$r .= '<meta property="og:type" content="website">';
$r .= '<meta property="og:url" content="https://' . LOCAL . $thing[1] . '/">';
$r .= '<title>' . $thing[0] . '.cf</title>';
$r .= '<link rel="apple-touch-icon-precomposed" href="https://' . LOCAL . 'xn--61h.cf/apple-touch-icon-precomposed.png">';
$r .= '<link rel="author" href="https://alexanderchristiaanjacob.com/">';
$r .= '<link rel="canonical" href="https://' . LOCAL . $thing[1] . '/">';
$r .= '<link rel="shortlink" href="//' . LOCAL . $thing[0] . '.cf/">';
$r .= '<style>';
$r .= '*{border:0;margin:0;outline:0;padding:0}';
$r .= 'body,canvas,html{background:#000;display:block;height:100%;overflow:hidden;width:100%}';
$r .= '</style>';
$r .= '<script src="https://' . LOCAL . 'xn--61h.cf/script.js"></script>';
$r .= '</head>';
$r .= '<body>';
$r .= '<canvas height="512" id="content" role="main" width="512"></canvas>';
$r .= '</body></html>';

if(isset($_GET['save'])) file_put_contents('index.html', $r);

header('Content-Type: text/html; charset=utf-8');

echo $r;
