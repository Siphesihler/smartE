<?php 
session_start();
require_once 'c:\xampp\htdocs\smartE\xxx.php';
require_once base_root('\Views\login_view.inc.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style_login.css">
    
</head>

<body>
    <div class="profile card login-page">
        <h1>Login/Register</h1>
        <div class="card-box">
            <div class="card-left profile-left">
                <h3>Login</h3>
                <form action="<?php base_root('includes\login.inc.php'); ?>" method="post" >
                    <div class="input-row">
                        <div class="input-group">
                            <div class="input-group">
                                <label">Username</label>
                                <input type="text" name="username" placeholder="Sihle">
                            </div>
                            <div class="input-group">
                                <label">Password</label>
                                <input type="password" name="pwd" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    
                    <div class="member">Not a member?
                        <a href="register">Register</a>
                    </div>
                    <div class="button">
                    <button type="submit">Submit</button>
                    </div>
                </form>
                <?php
                    check_login_errors();
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>