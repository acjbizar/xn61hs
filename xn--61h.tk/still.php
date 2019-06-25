<?php

session_start();

if(isset($_GET['kill']))
{
    session_destroy();
    exit();
}

define('LOCAL', ($_SERVER['SERVER_ADDR'] === '127.0.0.1') ? 'localhost/' : '');

if(!isset($_SESSION['s'])) $_SESSION['s'] = 0;// Step.
if(!isset($_SESSION['c1'])) $_SESSION['c1'] = array(255, 0, 0);// Color 1. (top left)
if(!isset($_SESSION['c2'])) $_SESSION['c2'] = array(255, 0, 0);// Color 2. (bottom left)
if(!isset($_SESSION['c3'])) $_SESSION['c3'] = array(255, 255, 255);// Color 3. (top right)
if(!isset($_SESSION['c4'])) $_SESSION['c4'] = array(255, 255, 255);// Color 4. (bottom right)
if(!isset($_SESSION['d'])) $_SESSION['d'] = 1;// Direction. (0=left, 1=top, 2=right, 3=bottom)
if(!isset($_SESSION['c'])) $_SESSION['c'] = 1;// Color position. (0=r, 1=g, 2=b

$color = array(
    'rgb(' . $_SESSION['c1'][0] . ', ' . $_SESSION['c1'][1] . ', ' . $_SESSION['c1'][2] . ')',
    'rgb(' . $_SESSION['c2'][0] . ', ' . $_SESSION['c2'][1] . ', ' . $_SESSION['c2'][2] . ')',
    'rgb(' . $_SESSION['c3'][0] . ', ' . $_SESSION['c3'][1] . ', ' . $_SESSION['c3'][2] . ')',
    'rgb(' . $_SESSION['c4'][0] . ', ' . $_SESSION['c4'][1] . ', ' . $_SESSION['c4'][2] . ')'
);

++$_SESSION['s'];

switch($_SESSION['d']):
case 0:// Left.
++$_SESSION['d'];
$r = mt_rand(0, 255);
$_SESSION['c1'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c1'][$_SESSION['c']] >= 255) $_SESSION['c1'][$_SESSION['c']] -= 255;
$r = mt_rand(0, 255);
$_SESSION['c2'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c2'][$_SESSION['c']] >= 255) $_SESSION['c2'][$_SESSION['c']] -= 255;
break;
case 1:// Top.
++$_SESSION['d'];
$r = mt_rand(0, 255);
$_SESSION['c1'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c1'][$_SESSION['c']] >= 255) $_SESSION['c1'][$_SESSION['c']] -= 255;
$r = mt_rand(0, 255);
$_SESSION['c3'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c3'][$_SESSION['c']] >= 255) $_SESSION['c3'][$_SESSION['c']] -= 255;
break;
case 2:// Right.
++$_SESSION['d'];
$r = mt_rand(0, 255);
$_SESSION['c3'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c3'][$_SESSION['c']] >= 255) $_SESSION['c3'][$_SESSION['c']] -= 255;
$r = mt_rand(0, 255);
$_SESSION['c4'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c4'][$_SESSION['c']] >= 255) $_SESSION['c4'][$_SESSION['c']] -= 255;
break;
case 3: // Bottom.
$_SESSION['d'] = 0;
$r = mt_rand(0, 255);
$_SESSION['c2'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c2'][$_SESSION['c']] >= 255) $_SESSION['c2'][$_SESSION['c']] -= 255;
$r = mt_rand(0, 255);
$_SESSION['c4'][$_SESSION['c']]+=$r;// top left
if($_SESSION['c4'][$_SESSION['c']] >= 255) $_SESSION['c4'][$_SESSION['c']] -= 255;
break;
endswitch;

$_SESSION['c'] = ($_SESSION['c'] === 2 ? 0 : $_SESSION['c'] + 1);


//echo '<pre>',print_r($color, TRUE),'</pre>';exit;

$r = '<!doctype html>';
$r .= '<html>';
$r .= '<head>';
$r .= '<meta charset="utf-8">';
//if($i !== 3) $r .= '<link rel="dns-prefetch" href="http://xn--72h.tk/">';
//if($i !== 2) $r .= '<link rel="dns-prefetch" href="http://xn--82h.tk/">';
//if($i !== 1) $r .= '<link rel="dns-prefetch" href="http://xn--92h.tk/">';
//if($i !== 0) $r .= '<link rel="dns-prefetch" href="http://xn--b3h.tk/">';
$r .= '<meta property="fb:admins" content="509248955">';
$r .= '<meta name="apple-mobile-web-app-capable" content="yes">';
$r .= '<meta name="author" content="Alexander Christiaan Jacob">';
$r .= '<meta name="description" property="og:description" content="By Alexander Christiaan Jacob, 2012.">';
//$r .= '<meta name="image" property="og:image" content="http://' . LOCAL . 'xn--72h.tk/image.jpg">';
$r .= '<meta name="robots" content="follow,noarchive,noindex">';
//$r .= '<meta name="title" property="og:title" content="' . $thing[0] . '.tk">';
$r .= '<meta property="og:type" content="website">';
//$r .= '<meta property="og:url" content="http://' . LOCAL . $thing[2] . '/">';
$r .= '<title>◐.tk</title>';
//$r .= '<link rel="apple-touch-icon-precomposed" href="http://' . LOCAL . 'xn--72h.tk/apple-touch-icon-precomposed.png">';
$r .= '<link rel="author" href="http://acjs.net/ego/">';
//$r .= '<link rel="canonical" href="http://' . LOCAL . $thing[2] . '/">';
//$r .= '<link rel="shortlink" href="http://' . LOCAL . $thing[0] . '.tk/">';
$r .= '<style>';
$r .= '*{border:0;margin:0;outline:0;padding:0}';
$r .= 'body,canvas,html{background:#000;display:block;height:100%;overflow:hidden;width:100%}';
$r .= '</style>';
$r .= '<script>

window.onload = window.onresize = init;

function init(e)
{
    canvas = document.getElementById("content");
    if(canvas.getContext)
    {
        context = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        var x = 0;
        var y = 0;
        var d = 256;
        // Top right.
        context.fillStyle = "' . $color[2] . '";
        context.translate(Math.floor(canvas.width/2), Math.floor(canvas.height/2-d));
        context.beginPath();
        context.moveTo(x-d, y+d);
        context.lineTo(x, y+d);
        context.arc(x, y+d, d, Math.PI * 1.5, Math.PI * 2, false);
        context.closePath();
        context.fill();
        // Bottom right.
        context.fillStyle = "' . $color[3] . '";
        context.translate(0,d);
        context.beginPath();
        context.moveTo(x, y-d);
        context.lineTo(x, y);
        context.arc(x, y, d, Math.PI * 2, Math.PI * 2.5, false);
        context.closePath();
        context.fill();
        // Bottom left.
        context.fillStyle = "' . $color[1] . '";
        context.translate(-d,0);
        context.beginPath();
        context.moveTo(x, y);
        context.lineTo(x + d, y);
        context.arc(x+d, y, d, Math.PI/2, Math.PI, false);
        context.closePath();
        context.fill();
        context.fillStyle = "' . $color[0] . '";
        context.translate(0,-d);
        context.beginPath();
        context.moveTo(x + d, y);
        context.lineTo(x + d, y + d);
        context.arc(x + d, y + d, d, Math.PI, Math.PI * 1.5, false);
        context.closePath();
        context.fill();
    }
}

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-6227584-49\']);
  _gaq.push([\'_setDomainName\', \'xn--b3h.tk\']);
  _gaq.push([\'_setAllowLinker\', true]);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>';
$r .= '</head>';
$r .= '<body>';
//$r .= '<h1>' . $thing[0] . '</h1>';
$r .= '<canvas id="content" role="main"><p>This work of art requires <abbr>canvas</abbr> support.</p></canvas>';
$r .= '</body></html>';

header('Content-Type: text/html; charset=utf-8');
echo $r;
