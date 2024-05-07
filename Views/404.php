<?php
require_once "func.php";
$request = parse_url($_SERVER["REQUEST_URI"])['path'];
dd($request);
?>
<h1>404</h1>
<p>You've reached the end of Internet.</p>
