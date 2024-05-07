<?php 
session_start();
require_once base_root('\includes\Dbh.php');
require_once base_root('\Model\recharge_model.inc.php');
require_once base_root('\Control\recharge_contr.inc.php');

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
    <title>Recharge</title>
</head>

<body>
    
    <section class="container">
        <?php require_once "topbar.php";?>
        <?php require_once "nav.php";?>
        <section class="main">
        <div class="recharge card">
                <h1>Recharge</h1>
                <div class="card-box">
                    <div class="card-left recharge-left">
                        <h3>Electricity Meter Recharge</h3>
                        <form action = "recharge_electricity.inc.php" id="ELec_form" method="post">
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Recharge</label>
                                    <input type="text" name="electricity_voucher" id="recharge_Elec" placeholder="XXXX-XXXX-XXXX-XXXX">
                                </div>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                        <?php
                            function check_recharge_errors(){
                                if(isset($_SESSION['errors_recharge'])){
                                    $errors = $_SESSION['errors_recharge'];
                            
                                    echo'<br>';
                            
                                    foreach($errors as $error){
                                        echo '<span class="failure">'.$error.'<br> </span>';
                                    }
                                    unset($_SESSION['error_recharge']);
                                }
                            }
                            check_recharge_errors();
                            ?>
                    </div>
                    <div class="card-right recharge-right">
                        <h3>Water Meter Recharge</h3>
                        <form action = "recharge_water.inc.php" id="Wat_form" method="post">
                            <div class="input-row">
                                <div class="input-group">
                                    <label">Recharge</label>
                                    <input type="text" name="water_voucher" id="recharge_wat" placeholder="XXXX-XXXX-XXXX-XXXX">
                                </div>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </section>
</body>
<script>
    document.getElementById("recharge_Elec").addEventListener("keydown", function(e) {
    const txt = this.value;
    // prevent more than 12 characters, ignore the spacebar, allow the backspace
    if ((txt.length == 19 || e.which == 32) & e.which !== 8) e.preventDefault();
    // add spaces after 3 & 7 characters, allow the backspace
    if ((txt.length == 4 || txt.length == 9 || txt.length == 14) && e.which !== 8)
      this.value = this.value + " ";
  });
    document.getElementById("recharge_wat").addEventListener("keydown", function(e) {
    const txt = this.value;
    // prevent more than 12 characters, ignore the spacebar, allow the backspace
    if ((txt.length == 19 || e.which == 32) & e.which !== 8) e.preventDefault();
    // add spaces after 3 & 7 characters, allow the backspace
    if ((txt.length == 4 || txt.length == 9 || txt.length == 14) && e.which !== 8)
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
    var frm = $('#ELec_form');

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
<script type="text/javascript">
    var frm = $('#Wat_form');

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
