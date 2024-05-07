<?php 
require_once 'c:\xampp\htdocs\smartE\xxx.php';
require_once base_root('\Views\signup_view.inc.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_login.css">
    
</head>

<body>
<div class="profile card register-page">
        <h1>Login/Register</h1>
        <div class="card-box">
            <div class="card-left profile-left">
                <h3>Register</h3>
                <form action="<?php base_root('includes\signup.inc.php'); ?>" method="post">
                    <h4>*means compulsory</h4>
                    <div class="input-row">
                        <div class="input-group">
                            <label">Username:*</label>
                            <input  type="text" name="username" placeholder="John123">
                        </div>
                        <div class="input-group">
                            <label">Full Name:*</label>
                            <input  type="text" name="fullName" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label">Email:*</label>
                            <input  type="email" name="email" placeholder="example@gmail.com">
                        </div>
                        <div class="input-group">
                            <label">Address:</label>
                            <textarea rows="2" name="address" placeholder="my address Rd,my Town, 4000"></textarea>
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label">Meter ID:</label>
                            <input type="text" name="meter_ID" placeholder="### ### ###">
                        </div>
                        <div class="input-group">
                            <label">Phone:*</label>
                            <input  type="text" name="phone" placeholder="### ### #### ">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label">Password:*</label>
                            <input  type="password" name="pwd" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <label">Confirm Password:*</label>
                            <input  type="password" name="pwd_conf" placeholder="Password">
                        </div>
                    </div>
                    <div class="member">Already a member?
                        <a href="login">Login</a>
                    </div>
                    <div class="button">
                    <button>Submit</button>
                    </div>
                    <?php
                    check_signup_errors();
                    ?>
                    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>