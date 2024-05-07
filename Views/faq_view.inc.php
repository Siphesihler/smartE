
<?php 
session_start();
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
    <script defer src="../scripts/activePage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>FAQ's</title>
</head>

<body>
    
    <section class="container">
        <?php require_once "topbar.php";?>
        <?php require_once "nav.php";?>
        <section class="main">
            <div>
                <h1>Frequently Asked Questions</h1>
            </div>
        </section>
    </section>
</body>
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
</html>
<?php
    
}else{
    header("Location:../index.php?login");
    die();
}

?>
