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
    0 => array('◐', 'xn--61h.ga', 'xn--91h.ga'),
    1 => array('◓', 'xn--91h.ga', 'xn--71h.ga'),
    2 => array('◑', 'xn--71h.ga', 'xn--81h.ga'),
    3 => array('◒', 'xn--81h.ga', 'xn--61h.ga'),
);

$thing = $things[$i];

$r = '<!doctype html>';
$r .= '<html>';
$r .= '<head>';
$r .= '<meta charset="utf-8">';
if($i !== 3) $r .= '<link rel="dns-prefetch" href="http://xn--81h.ga/">';
if($i !== 2) $r .= '<link rel="dns-prefetch" href="http://xn--71h.ga/">';
if($i !== 1) $r .= '<link rel="dns-prefetch" href="http://xn--91h.ga/">';
if($i !== 0) $r .= '<link rel="dns-prefetch" href="http://xn--61h.ga/">';
if(!isset($_GET['pause'])) $r .= '<meta http-equiv="Refresh" content="1; url=http://' . LOCAL . $thing[2] . '/">';
$r .= '<meta property="fb:admins" content="509248955">';
$r .= '<meta name="apple-mobile-web-app-capable" content="yes">';
$r .= '<meta name="author" content="Alexander Christiaan Jacob">';
$r .= '<meta name="description" property="og:description" content="By Alexander Christiaan Jacob, 2012.">';
$r .= '<meta name="image" property="og:image" content="http://' . LOCAL . 'xn--61h.ga/image.jpg">';
$r .= '<meta name="image" property="og:image:height" content="240">';
$r .= '<meta name="image" property="og:image:width" content="240">';
$r .= '<meta name="title" property="og:title" content="' . $thing[0] . '.ga">';
$r .= '<meta property="og:type" content="website">';
$r .= '<meta property="og:url" content="http://' . LOCAL . $thing[1] . '/">';
$r .= '<title>' . $thing[0] . '.ga</title>';
$r .= '<link rel="apple-touch-icon-precomposed" href="http://' . LOCAL . 'xn--61h.ga/apple-touch-icon-precomposed.png">';
$r .= '<link rel="author" href="http://acjs.net/ego/">';
$r .= '<link rel="canonical" href="http://' . LOCAL . $thing[1] . '/">';
$r .= '<link rel="shortlink" href="http://' . LOCAL . $thing[0] . '.ga/">';
$r .= '<style>';
$r .= '*{border:0;margin:0;outline:0;padding:0}';
$r .= 'body,canvas,html{background:#000;display:block;height:100%;overflow:hidden;width:100%}';
$r .= '</style>';
$r .= '<script src="http://' . LOCAL . 'xn--61h.ga/script.js"></script>';
$r .= '</head>';
$r .= '<body>';
$r .= '<canvas height="512" id="content" role="main" width="512"></canvas>';
$r .= '</body></html>';

if(isset($_GET['save'])) file_put_contents('index.html', $r);

header('Content-Type: text/html; charset=utf-8');

echo $r;
