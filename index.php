<?php
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_SERVER["REQUEST_METHOD"];

$GETroutes = [
    '/smartE/' => 'login.php',
    '/smartE/login' => 'login.php',
    '/smartE/register' => 'register.php',
    '/smartE/Dashboard' => 'Views/userdash_view.inc.php',
    '/smartE/Profile' => 'Views/profile_view.inc.php',
    '/smartE/Recharge' => 'Views/recharge_view.inc.php',
    '/smartE/Contact' => 'Views/enquiry_view.inc.php',
    '/smartE/FAQ' => 'Views/faq_view.inc.php',
    '/smartE/api/voucher' => 'api/meter.php'
];
$POSTroutes = [
    '/smartE/api/meter' => 'api/meters.php'
];


function route($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    }else{
        require 'Views/404.php';
        die();
    }
}
if($method==='GET'){
    route($uri, $GETroutes);
}else if($method==='POST'){
    route($uri, $POSTroutes);
}
require 'Views/404.php';
die();