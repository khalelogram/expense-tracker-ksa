<?php
require_once('private/init.php');
include('inc/header.php');
$sql = "SELECT id, fullname, email,user_image,user_bio,mobile_number FROM users where id = '1'";
$result = mysqli_query($db, $sql);
if(!$result) {
  exit("Data query failed:" . mysqli_error(db_connection()));
}
?>
<style type="text/css">
  .spacing{height: 30px;}
  .btn-style, .btn-save{
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
 <?php while($row = mysqli_fetch_assoc($result)) : ?>
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
     <?php include('inc/navbar.php');?> 
<!-- End of Topbar -->

<!-- container -->
    <div class="container" style="max-width: 100%;">
      <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <a class="btn-update btn-style"><i class="fas fa-user-edit fa-sm fa-fw"></i></a>
                  <button style="border:none;background: none;" type="submit" name="submit" class="btn-save"><i class="fas fa-save btn-save btn-style"></i></button>

                  <input type="hidden" name="userid" id="userid" value="<?php echo $row['id']; ?>">

                  <div class="text-center">                   
                        <img style="height:200px;width:200px;border-radius: 50%;margin-top:50px;margin-bottom: 10px;" src="img/<?php if($row['user_image'] == null || $row['user_image'] == null){ echo 'default_profile.jpg'; }else{ echo $row['user_image']; }?>"  class="fileToUpload_show">
                        <input type="file" name="myfile" id="fileToUpload" class="fileToUpload_edit" style="display:none;margin: auto;">
                        <h1 class="edit_fullname" style="display: none;"><input type="text" name="fullname" id="fullname" class="" style="border:none;border-color: transparent;" value="<?php echo $row['fullname']; ?>"></h1>  
                        <h1 class="display_fullname" ><?php echo $row['fullname']; ?></h1>
                      <div class="bio" style="margin: 20px;">
                        <textarea class="form-control edge-corner user_bio_edit" name="user_bio" id="user_bio" style="display:none;"><?php echo $row['user_bio']; ?></textarea>
                        <p class="user_bio_display"><?php echo $row['user_bio']; ?></p>
                      </div>
                  </div>
                  <div class="details">
                    <div class="container">
                      <div class="row ">
                        <div class="col-md">
                         Email: <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" class="form-control edge-corner" style="border:none;border-color: transparent;" value="<?php echo $row['email']; ?>">
                        </div>
                        <div class="col-md">
                         Contact: <input type="text" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required
       minlength="11" maxlength=11 name="mobile_number" id="mobile_number" class="form-control edge-corner" style="border:none;border-color: transparent;" value="<?php echo $row['mobile_number']; ?>">
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
    // $('.fileToUpload_show').hide();
    $('.fileToUpload_edit').css('display','block');
  });  
</script>
</body>
</html>

