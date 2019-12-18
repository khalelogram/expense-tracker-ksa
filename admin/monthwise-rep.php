<?php 
require_once('private/init.php');
include('inc/header.php');
error_reporting(0);
 ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Sidebar -->
    <?php include('inc/sidebar.php'); ?>
    <!-- End of Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->



   <!-- START OF MAIN CONTENT -->
      <div class="container" style="display: flex;">
              <div class="col-md-4">
              <form role="form" method="post" action="monthwise-rep.php" name="bwdatesreport">
                <div class="form-group">
                  <h5 style="padding-left: 5px">CHECK YOUR MONTHLY EXPENSES</h5>
                  <label style="font-size: 15px;">From</label>
                  <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
                </div>
                <div class="form-group">
                  <label style="font-size: 15px;">To</label>
                  <input class="form-control" type="date"  id="todate" name="todate" required="true">
                </div>
                  
                <div class="form-group has-success">
                    <button type="submit" class="btn btn-primary" name="submit">Check now!</button>
                </div>
                
                </form>
              </div>
<!-- START OF REPORT RESULT -->
<div class="col-md-8">
<div class="row">
      <div class="col-lg-12">
      
        <div class="panel panel-default">

            <div class="panel-body">

            <div class="col-md-12">
          
<?php
$fdate=$_POST['fromdate'];
 $tdate=$_POST['todate'];
?>
<h4 align="center" style="color:#1c10d0">Monthly expenses report from <?php echo $fdate?> to <?php echo $tdate?></h4>
<hr />
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                <tr style="background-color: #4E73DF; color: white;">
              <th>NO</th>
              <th>Month-Year</th>
              <th>Expense Amount</th>
                </tr>
                                        </tr>
                                        </thead>
 <?php
// $userid=$_SESSION['detsuid'];
$ret=mysqli_query($db,"SELECT month(expense_date) as rptmonth,year(expense_date) as rptyear,SUM(expense_cost) as totalmonth FROM userexpense  where (expense_date BETWEEN '$fdate' and '$tdate') group by month(expense_date),year(expense_date)");
// && (user_id='$userid')


// this code will check your connection to your database.
//  if ($db) { 
//   echo 'connected';
// } else {
//   echo 'not connected';
// }
$cnt=1;

$totalsexp=0;
while ($row=mysqli_fetch_array($ret)) {

$totalsexp=null;


?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['rptmonth']."-".$row['rptyear'];?></td>
                  <td><?php  echo $ttlsl=$row['totalmonth'];?></td>
           
           
                </tr>
                <?php
                $totalsexp+=$ttlsl; 
$cnt=$cnt+1;
}?>

 <tr>
  <th colspan="2" style="background-color: #2b35af; color: white; text-align:center">Grand Total</th>     
  <td><?php echo $totalsexp;?></td>
 </tr>     

                                    </table>

            </div>
          </div>
        </div><!-- /.panel-->
      </div><!-- /.col-->
    </div><!-- /.row -->
<!-- END OF REPORT RESULT -->



</div>
            </div>
                
              
            
            </div>
<!-- END OF MAIN CONTENT -->
<?php include ('inc/footer.php'); ?>
