<?php 
session_start();
require_once 'c:\xampp\htdocs\smartE\xxx.php';
require_once base_root('\includes\Dbh.php');
require_once base_root('\Model\userDash_model.inc.php');
require_once base_root('\Control\userDash_contr.inc.php');
if(isset($_SESSION["user_id"])){ ?>

<?php

$user= new UserDashC($_SESSION["user_id"]);
$user->get_latest_data_id();
$chart_data=$user->get_chart_data_id();


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
    <script>
        setInterval(function(){
            location.reload();
        },6000);
    </script>

    <title>Dashboard</title>
</head>

<body>
    
    <section class="container">
        
        <?php require_once "topbar.php";?>
        <?php require_once "nav.php";?>
        <section class="main">
            <div class="container-fluid">
                <div class="card-Dash Electricity">
                    <h2 class="ml-auto mr-4 mt-3 mb-0">Electricity Meter</h2>
                    <i class="fa fa-bolt fa-3x" aria-hidden="true"></i>
                    <p class="ml-auto mr-4 mb-0 med-font">Balance:</p>
                    <h1 class="ml-auto mr-4 large-font">R<?php echo $user->Elec_bal;?></h1>
                    <p class="ml-auto mr-4 mb-0 med-font">Consumption:</p>
                    <h1 class="ml-auto mr-4 large-font"><?php echo $user->Elec_cons;?> kw/h</h1>
                    
                </div>
                <div class="card-Dash Water">
                    <h2 class="ml-auto mr-4 mt-3 mb-0">Water Meter</h2>
                    <i class="fa fa-tint fa-3x" aria-hidden="true"></i>
                    <p class="ml-auto mr-4 mb-0 med-font">Balance:</p>
                    <h1 class="ml-auto mr-4 large-font">R<?php echo $user->Wat_bal;?></h1>
                    <p class="ml-auto mr-4 mb-0 med-font">Consumption:</p>
                    <h1 class="ml-auto mr-4 large-font"><?php echo $user->Wat_cons;?> L</h1>
                    
                </div>
            </div>

            <div class="charts">
                <div class="chart">
                    <h2>Smart Meter Consumption</h2>
                    
                    <div id="curve_chart" style="width: 1000px; height: 600px"></div>
                    
                </div>
            </div>
        </section>
    </section>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time', 'Electricity Consumption in kw.h', 'Water Consumption in L'],
          <?php 
          foreach($chart_data as $row){
            echo "['" .htmlspecialchars($row['created_at'])."',".htmlspecialchars($row['Elec_cons']).",".htmlspecialchars($row['Wat_cons'])."],";
            } ?>
        ]);

        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
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
    
</body>

</html>
<?php
    
}else{
    header("Location:../index.php?login");
    die();
}

?>
