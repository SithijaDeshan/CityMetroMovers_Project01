<!DOCTYPE html>

<?php

session_start();
if(!isset($_SESSION['auth'])){
    
    $_SESSION['message'] = "Login to access dashboard";
    header("Location: signin.php");
    exit(0); 
}

if($_SESSION['auth_role'] != "station_operator" && $_SESSION['auth_role'] != "moderator" && $_SESSION['auth_role'] != "admin"){
    header("Location: signin.php");
    exit(0);
}

require './Classes/Station_Master.php';
use Classes\Station_Master;

$Station_Master = new Station_Master();
use Classes\DBConnector;
  
$dbcon =new DBConnector();                                             

?>

<?php
//    $year_select;
//    if($_SERVER["REQUEST_METHOD"]==="POST"){
//    
//    if(isset($_POST["submit"])){
//        
//            $year_select =$_POST["year"];
//           
//         
//    }
//}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Verdana, Geneva, Tahoma, sans-serif
&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/31a106ca50.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand " style="background-color: rgb(99,89,133);">
            <!-- Navbar Brand-->

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars" style="color: white;"  onmouseover="animateButton(this, 'scale(1.5)')" onmouseout="animateButton(this, 'scale(1)')"></i></button>
            <script>
                function animateButton(button, transformation) {
                    button.style.transform = transformation;
                }
            </script>
           
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                
                <nav class="sb-sidenav accordion" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu" style="background-color: rgb(99,89,133);">


                        <div class="nav mt-4" >
                           
                            <a class="nav-link" href="station_B.php" style="color: white;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="Station_master_dashbord.php" style="color: white;">
                                <div class="sb-nav-link-icon"><i class="fa fa-laptop"></i></div>
                                Stations
                            </a>

                            <a class="nav-link" href="index.php" style="color: white;">
                                <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                Website
                            </a>
                           
                            <a class="nav-link" href="stationUser.php" style="color: white;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Ticket Issue
                            </a>
                            
                           
                            
                         

                           
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="my-4 text-center" style="font-family: 'Verdana, Geneva, Tahoma, sans-serif
', cursive;">Station B</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashbord</li>
                        </ol>
                        <div class="row">
                           
                            <div class="col-xl-3 col-md-6" style="margin-right: 10%">
                                <div class="card  text-dark mb-4" style="background-image: url('totticket.jpeg'); background-size: cover; background-position: center;">
                                    <div class="card-body" style="color: white"><i style="color: white" class="fa-solid fa-ticket fa-beat fa-lg"></i><h3 class="h2_topics" style="color: white">Today tickets : </h3></div>

                                    <h3 style= "text-align: center; color: white;">
                                        
                                         <?php  
                                    
                                    $itararies=$Station_Master->getIteraries("B");
                                    echo $itararies;
                                    
                                    ?>
                                        
                                    </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card  text-dark mb-4" style="background-image: url('totearnings.jpeg'); background-size: cover; background-position: center;">
                                    <div class="card-body" style="color: white;"><i style="color: white" class="fa-solid fa-wallet fa-beat fa-lg" ></i><h3 class="h2_topics" style="color: white">Today Earnings :</h3></div>
                                    <h3 style= "text-align: center; color: white;">
                                    <?php  
                                    
                                    $earnings =$Station_Master->getEarnings("B"); 
                                     echo "Rs ".$earnings.".00";
                                    
                                    ?>
                                        
                                    </h3>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-top: 10%;">
                           
                            <div class="col-xl-12">
                                
                                <i class="fas fa-chart-bar me-1"></i>
                                        Monthly Earnings : 
                                <div class="card mb-4 card-22">
                                    <div class="card-header">
                                       
                                        
<!--                                       <div style="display:flex;">
                                        <form method="POST" action="//">
                                            <label for="year">Choose Year:</label>
                                            <select id="cars" name="year">
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            </select>
                                            <input type="submit" name="submit" value="Enter" style="background-color: aquamarine">
                                           
                                        </form>
                                            
                                        </div>    -->
                                    </div>
                                    <div class="card-body">
                                        
  
                                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                        
                                        <script type="text/javascript">
                                                
                                          google.charts.load('current', {'packages':['bar']});
                                          google.charts.setOnLoadCallback(drawStuff);

                                          function drawStuff() {
                                            var data = new google.visualization.arrayToDataTable([
                                              ['Month','Income'],
                                               
                                                
                                                
                                          <?php
                                          $con1 = $dbcon->getConnection();
                                          for ($x = 1; $x <= 12; $x++) {
                                              $query4 = "SELECT SUM(price) AS money,Month(Issue_date) AS Month FROM station_user WHERE Month(Issue_date)=$x AND Start_station='B'";
                                              $pstmt = $con1->prepare($query4);
                                              $pstmt->execute();
                                              $rs4 = $pstmt->fetch(PDO::FETCH_ASSOC);
                                              $mon = $rs4['money'];
                                              ?>
                                              
                                                ['<?php echo $x; ?>', '<?php echo $mon; ?>'],                
                                                    
                                              <?php
                                         }
                                          ?>
                                               
                                          ]);

                                            var options = {
                                             
                                              width: 900,
                                              legend: { position: 'none' },
                                              
                                              bars: 'horizontal', // Required for Material Bar Charts.
                                              axes: {
                                                x: {
                                                  0: { side: 'top', label: 'Income'} // Top x-axis.
                                                }
                                              },
                                              bar: { groupWidth: "90%" }
                                            };

                                            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                            chart.draw(data, options);
                                          }
                                        </script>

                                        <body>
                                            <div id="top_x_div" style="width: 900px; height: 500px;"></div>
                                        </body>


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </main>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>