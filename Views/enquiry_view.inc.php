<?php 
session_start();
require_once base_root('\includes\Dbh.php');
require_once base_root('\Model\enquiry_model.inc.php');
require_once base_root('\Control\enquiry_contr.inc.php');
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
    <title>Enquiry</title>
</head>

<body>
    
    <section class="container">
        <?php require_once "topbar.php";?>
        <?php require_once "nav.php";?>
        <section class="main">
        <div class="enquiry card">
                <h1>Connect With Us</h1>
                <div class="card-box">
                    <div class="card-left contact-left">
                        <h3>Send your request</h3>
                        <form action="../includes/enquiry.inc.php" id="Enq_form" method="post">
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Name</label>
                                    <input type="text" name="fullName" placeholder="John Doe">
                                </div>
                                <div class="input-group">
                                    <label">Phone</label>
                                    <input type="text" name="phone" placeholder="071 234 56789">
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Email</label>
                                    <input type="email" name="email" placeholder="example@gmail.com">
                                </div>
                                <div class="input-group">
                                    <label">Subject</label>
                                    <input type="text" name="subject" placeholder="NEW SMART METER REQUEST">
                                </div>
                            </div>
                            <label>Message</label>
                            <textarea rows="5" name="message" placeholder="Your Message"></textarea>
                            <button type="submit">SEND</button>
                        </form>
                        <?php
                            function check_enquiry_errors(){
                                if(isset($_SESSION['errors_enquiry'])){
                                    $errors = $_SESSION['errors_enquiry'];
                            
                                    echo'<br>';
                            
                                    foreach($errors as $error){
                                        echo '<span class="failure">'.$error.'<br> </span>';
                                    }
                                    unset($_SESSION['error_enquiry']);
                                }
                            }
                            check_enquiry_errors();
                        ?>
                    </div>
                    <div class="card-right">
                        <h3>Reach Us</h3>
                        <table>
                            <tr>
                                <td>Email</td>
                                <td>SmartE@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>+27734972216</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>31 Mazisi Kunene Rd, Durban Berea, 4004</td>
                            </tr>
                        </table>
                    </div>
                </div>
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
<script type="text/javascript">
    var frm = $('#Enq_form');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert(data);
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
