<?php 

require_once('private/init.php');
require_login();
include('inc/header.php');

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
       <?php  include('inc/navbar.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <?php echo $_SESSION['user_id']; ?> -->
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Expense</div>
                      <?php
                        $todays_date = date('Y-m-d');
                        $result = show_all_today_and_yesterday($todays_date);
                        $user_today_expense = mysqli_fetch_assoc($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $user_today_expense['cost']; ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Yesterday Expense</div>
                      <?php
                        $yesterday_date = date('Y-m-d', strtotime("-1 day"));
                        $result = show_all_today_and_yesterday($yesterday_date);
                        $user_yesterday_expense = mysqli_fetch_assoc($result);
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $user_yesterday_expense['cost'];?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php
                         $last_week = date('Y-m-d', strtotime("-1 week"));
                         $result = show_all_week_and_month_exp($last_week, $current);
                         $user_lastweek_expense = mysqli_fetch_assoc($result);
                    ?>
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Last Week expense</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $user_lastweek_expense['cost']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php
                         $last_month = date('Y-m-d', strtotime("-1 month"));
                         $result = show_all_week_and_month_exp($last_month, $current);
                         $user_lastmonth_expense = mysqli_fetch_assoc($result);
                    ?>
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">last month expense</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $user_lastmonth_expense['cost']; ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body exp-h">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <?php
                        $this_year = date('Y');
                        $result = show_this_year_expense($this_year);
                        $user_thisyear_expense = mysqli_fetch_assoc($result);
                      ?>
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">This Year Expenses</div>                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">$<?php echo $user_thisyear_expense['cost']; ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body exp-h">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Expenses</div>                      
                      <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">$5000</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
           </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


  <?php include('inc/footer.php'); ?>
