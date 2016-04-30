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
    <title>SLB Negeri Cicendo Bandung | Profil Saya</title>
   
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
              <div class="box-body">
              <?php  
                 if(isset($_GET['message']))
                 {
                  ?><div class="col-xs-12"><?php
                 	 $msg = $_GET['message'];
                   switch ($msg) {
                     case 'success':
                        ?><div class="alert alert-success alert-dismissable">
                          <?php echo "Profil berhasil diperbaharui"; ?>
                        </div><?php
                       break;
                    case 'success_edit':
                        ?><div class="alert alert-success alert-dismissable">
                          <?php echo "Profil berhasl diperbaharui"; ?>
                        </div><?php
                       break;
                      ?></div><?php
                   }
                 }
                 ?> 
                <!-- form start -->
                <form role="form" method="post" action="../proses.php?proses=edit_profil" enctype="multipart/form-data">
                  
                  <input type="hidden" name="id" value="<?php echo $r['id_user'] ?>">
				 

					<div class="form-group">
                      <?php echo "<img src='../../img/profil/".$r['foto']."' style= width:90px; height:80px;
					  border-radius:10px 10px 10px 10px'>" ?>
							</div>							
					
					<div class="form-group">	
                      <label for="exampleInputEmail1">Perbarui Foto</label>
                      		<input name="foto" type="file">
							</div>							

					<div class="form-group">							
                      <label for="exampleInputEmail1">NIP</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="text" name="nip" class="form-control" id="exampleInputEmail1" placeholder="NIP" value="<?php echo $r['nip']?>">
                    </div>
				  
				  <div class="form-group">
                      <label for="exampleInputEmail1">Nama pengguna</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="text" name="pengguna" class="form-control" id="exampleInputEmail1" placeholder="Nama pengguna" value="<?php echo $r['nama_user']?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat Email</label>
                      <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" type="email" name="emaill" class="form-control" id="exampleInputEmail1" placeholder="alamat email" value="<?php echo $r['email']?>">
                    </div>

                    <?php 
                    $jab = $r['jabatan_id'];
                    $queryj = mysql_query("SELECT * FROM jabatan WHERE id_jabatan=$jab");

                    $j = mysql_fetch_array($queryj);  
                     ?>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <input class="form-control" type="text" name="jabatan" value="<?php echo $j['nama_jabatan']; ?>" disabled>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                  </div>
                </form>
                <a href="password.php?id=<?php echo $r['id_user'] ?>" class="btn btn-default">Ganti Password</a>
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
