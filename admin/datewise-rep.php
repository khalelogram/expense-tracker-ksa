<?php 
require_once('private/init.php');
$page_title = 'Daily Report';
include('inc/header.php');

$fdate = null;
$tdate = null;
 
if(isset($_POST['submit'])){
  $fdate=$_POST['fromdate'];
  $tdate=$_POST['todate'];
}
 ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include('inc/sidebar.php'); ?>
    <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
          <!-- NavBar -->
          <?php include('inc/navbar.php'); ?>

<!-- START OF MAIN CONTENT -->
<div id="smc" class="container">

        <!-- DATE INPUT FORMS -->
        <div id="dif" class="col-md-4">

        <h5>CHECK YOUR DAILY EXPENSES</h5>
        <form role="form" method="post" action="" name="bwdatesreport">
          <div class="form-group">
            <label>From</label>
            <input class="form-control" type="date"  id="fromdate" name="fromdate" required="true">
          </div>
          <div class="form-group">
            <label>To</label>
            <input class="form-control" type="date"  id="todate" name="todate" required="true">
          </div>
            
          <div class="form-group has-success">
              <button type="submit" class="btn btn-primary" name="submit">Check now!</button>
          </div>
          </form>

        </div>

  <!-- START OF REPORT RESULT -->
  <div id="rret" class="col-md-8">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-12">

  <!-- table header -->
<h4 id="thdr" align="center">Daily expenses report from <?php echo $fdate?> to <?php echo $tdate?></h4>
<hr/>
<table id="datatable" class="table table-bordered dt-responsive nowrap">
    <thead>
      <tr>
        <tr id="tblheads">
          <th>S.NO</th>
          <th>Date</th>
          <th>Expense Amount</th>
        </tr>
      </tr>
    </thead>

<?php
// $userid=$_SESSION['detsuid'];
$result = show_daily_report($fdate,$tdate);
$cnt=1;
$totalsexp=null;
while ($row=mysqli_fetch_array($result)) {
?>
          <tr>
            <td><?php  echo $cnt;?></td>
            <td><?php  echo $row['expense_date'];?></td>
            <td><?php  echo $ttlsl=$row['totaldaily'];?></td>           
          </tr>
<?php
$totalsexp+=$ttlsl; 
$cnt=$cnt+1;
}?>
          <tr>
            <th id="grandttl" colspan="2">Grand Total</th>
            <td><?php echo $totalsexp;?></td>
          </tr>     
</table>

            </div><!-- col-md-12 -->
          </div><!-- panel -->
        </div><!-- panel-default-->
      </div><!-- col-lg-12-->
    </div><!-- row -->
  </div> <!-- col-md-8 -->
<!-- END OF REPORT RESULT -->

</div> <!-- container -->                 
<!-- END OF MAIN CONTENT -->

        </div> <!-- content -->

<?php include ('inc/footer.php'); ?>