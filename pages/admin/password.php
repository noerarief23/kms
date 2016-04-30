<?php
    session_start();
    include "../koneksi.php";
    if($_SESSION['status'] == false)
    {
      header("location:../login.php?message=login_first");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SLB Negeri Cicendo Bandung | Ganti Password</title>
   
<?php
    include "../include/style.php";
?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

<?php
    include "../include/header.php";
    include "../include/sidebar.php";
?>
     
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
          <?php
                $id = $_GET['id'];
                $query = mysql_query("SELECT * FROM user WHERE id_user=$id");

                $r = mysql_fetch_array($query);               
          ?>
        <!-- Main content -->
        <section class="content">
       <!-- general form elements -->
              <div class="box box-primary">
              <?php  
                 if(isset($_GET['message']))
                 {
                  ?>
                 <div class="alert alert-success alert-dismissable">   
                    <?php
                      if($_GET['message'] == 'success_edit')
                          echo "Password berhasil diperbaharui";   
                      else if($_GET['message'] == 'pass_tidak_sama')
                          echo "Password tidak sama";    
                          else if($_GET['message'] == 'pass_lama_salah')
                          echo "Password yang anda masukkan salah";     
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 
              
                <!-- form start -->
                <form role="form" method="post" action="../proses.php?proses=edit_password">
                  <div class="box-body">
                  <input type="hidden" name="id" value="<?php echo $r['id_user'] ?>">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Password Lama</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="password" name="password_lama" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Password Baru</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="password" name="password" class="form-control" id="exampleInputEmail1" required>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Ulangi Password Baru</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="password" name="password_lagi" class="form-control" id="exampleInputEmail1" required>
                  </div>

                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                  </div>
                </form>
              </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

    <?php
      include "../include/rightNfooter.php";
    ?>
        
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


    <?php
      include "../include/scripts.php";
    ?>

    <script type="text/javascript">
  
      var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    </script>

  </body>
</html>
