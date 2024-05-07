<?php 
session_start();
require_once base_root('\includes\Dbh.php');
require_once base_root('\Model\profile_model.inc.php');
require_once base_root('\Control\profile_contr.inc.php');
if(isset($_SESSION["user_id"])){ ?>


<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style_home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Profile Information</title>
</head>

<body>
    
    <section class="container">
        <?php require_once "topbar.php";?>
        <?php require_once "nav.php";?>
        <section class="main">
        <div class="profile card">
                <h1>Profile Information</h1>
                <div class="card-box">
                    <div class="card-left profile-left">
                        <h3>Update Profile</h3>
                        <form action="../includes/profile.inc.php" id="Prof_form" method="post">
                            <h4>*means compulsory</h4>
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Username:*</label>
                                    <input  type="text" name="username" placeholder="John1212" disabled value= "<?php echo $_SESSION["user_username"];?>">
                                </div>
                                <div class="input-group">
                                    <label">Full Name:*</label>
                                    <input  type="text" name="fullName" placeholder="John Doe" value= "<?php echo $_SESSION["user_fullName"];?>">
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Email:*</label>
                                    <input  type="email" name="email" placeholder="example@gmail.com" disabled value= "<?php echo $_SESSION["user_email"];?>">
                                </div>
                                <div class="input-group">
                                    <label">Address:</label>
                                    <textarea rows="2" name="user_address" placeholder="12 Mazisi Kunene Rd, Berea, 4004"><?php echo $_SESSION["user_address"];?></textarea>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Meter ID:</label>
                                    <input type="text" name="meter_ID" placeholder="123 456 789" disabled value= "<?php echo $_SESSION["user_meterNo"];?>">
                                </div>
                                <div class="input-group">
                                    <label">Phone:*</label>
                                    <input  type="text" id="phone" name="phone" placeholder="071 234 5678" value= "<?php echo $_SESSION["user_phone"];?>">
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
                            <div class="button">
                            <button>Submit</button>
                            </div>
                        </form>
                        <?php
                            function check_update_errors(){
                                if(isset($_SESSION['errors_update'])){
                                    $errors = $_SESSION['errors_update'];
                            
                                    echo'<br>';
                            
                                    foreach($errors as $error){
                                        echo '<span class="failure">'.$error.'<br> </span>';
                                    }
                                    unset($_SESSION['error_update']);
                                }
                            }
                            check_update_errors();
                            ?>
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
<script>
    document.getElementById("phone").addEventListener("keydown", function(e) {
    const txt = this.value;
    // prevent more than 12 characters, ignore the spacebar, allow the backspace
    if ((txt.length == 12 || e.which == 32) & e.which !== 8) e.preventDefault();
    // add spaces after 3 & 7 characters, allow the backspace
    if ((txt.length == 3 || txt.length == 7) && e.which !== 8)
      this.value = this.value + " ";
  });
</script>
<script>
    const activePage = window.location.pathname;
    const pageName = activePage.split("/").pop();


    if (pageName=== "userdash_view.inc.php"){
        document.querySelector(".Dashboard_link").classList.add("active");
    }
    else if (pageName=== "profile_view.inc.php"){
        document.querySelector(".Profile_link").classList.add("active");
    }
    else if (pageName=== "recharge_view.inc.php"){
        document.querySelector(".Recharge_link").classList.add("active");
    }
    else if (pageName=== "enquiry_view.inc.php"){
        document.querySelector(".Enquire_link").classList.add("active");
    }
    else if (pageName=== "FAQ_view.inc.php"){
        document.querySelector(".FAQ_link").classList.add("active");
    }

</script>
<script type="text/javascript">
    var frm = $('#Prof_form');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert(data);
                console.log(data);
            },
            error: function (data) {
                alert('An error occurred.');
                console.log(data);
            },
        });
    });
</script>
</html>
<?php

    
}else{
    header("Location:../index.php?login");
    die();
}

?>
