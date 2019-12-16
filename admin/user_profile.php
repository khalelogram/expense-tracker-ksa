<?php

require_once('private/init.php');
include('inc/header.php');


//Added by EC
$sql = "SELECT id, fullname, email,user_image,user_bio,mobile_number FROM users where id = '1'";

$result = mysqli_query($db, $sql);
if(!$result) {
  exit("Data query failed:" . mysqli_error(db_connection()));
}

?>
<style type="text/css">
  .spacing{height: 30px;}
  .btn-style{
    width:150px;
    display: block;
    background: #4e73df;
    color:white !important;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    float:right;
    margin-right: 10px;
  }
</style>

<body id="page-top">

<!-- start wrapper -->
<div id="wrapper">

<!-- SIDEBAR -->
  <?php include('inc/sidebar.php');?>  
<!-- END SIDEBAR -->

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
                <img class="img-profile rounded-circle" src="img/<?php if($row['user_image'] == null || $row['user_image'] == null){ echo 'default_profile.jpg'; }else{ echo $row['user_image']; }?>">
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

<!-- container -->
    <div class="container" style="max-width: 100%;">
      <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <a class="btn-update btn-style">Update Profile</a>
                <input type="submit" value="Save Profile" class="btn-save btn-style" name="submit">
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                  <input type="hidden" name="userid" id="userid" value="<?php echo $row['id']; ?>">
                  <div class="text-center">                   
                        <img style="height:200px;width:200px;border-radius: 50%;margin-top:30px;margin-bottom: 10px;" src="img/<?php if($row['user_image'] == null || $row['user_image'] == null){ echo 'default_profile.jpg'; }else{ echo $row['user_image']; }?>"  class="fileToUpload_show">
                        <input type="file" name="myfile" id="fileToUpload" class="fileToUpload_edit" style="display:none;">
                        <h1 class="edit_fullname" style="display: none;"><input type="text" name="fullname" id="fullname" class="" style="border:none;border-color: transparent;" value="<?php echo $row['fullname']; ?>"></h1>  
                        <h1 class="display_fullname" ><?php echo $row['fullname']; ?></h1>
                      <div class="bio" style="margin: 20px;">
                        <textarea class="form-control edge-corner user_bio_edit" name="user_bio" id="user_bio" style="display:none;"><?php echo $row['user_bio']; ?></textarea>
                        <p class="user_bio_display"><?php echo $row['user_bio']; ?></p>
                      </div>
                  </div>
                  <div class="details">
                    <div class="container">
                      <div class="row">
                        <div class="col-md">
                         Email: <input type="text" name="email" id="email" class="form-control edge-corner" style="border:none;border-color: transparent;" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="col-md">
                         Contact: <input type="text" name="mobile_number" id="mobile_number" class="form-control edge-corner" style="border:none;border-color: transparent;" value="<?php echo $row['mobile_number']; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
              </form>
            </div>
          <div class="spacing"></div>
        </div>
      </div>
    </div>


<!-- container -->

    </div>
<!-- END MAIN CONTENT -->
<!-- FOOTER -->
 <?php include('inc/footer.php');?> 
 <!-- END FOOTER -->


</div>
<!-- END CONTENT WRAPPER -->

</div>
<!-- end wrapper -->

<script>
  $('.btn-save').hide();
  $(".email").prop("disabled", true);
  $('.btn-update').click(function(){
    $(".email").removeAttr('disabled');
    $('.btn-save').show();
    $('.edit_fullname').css('display','block');
    $('.display_fullname').hide();
    $('.user_bio_edit').css('display','block');
    $('.user_bio_display').hide();
    $('.btn-save').show();
    $(this).hide();
    $('.fileToUpload_show').hide();
    $('.fileToUpload_edit').css('display','block');
  });  
</script>
</body>
</html>