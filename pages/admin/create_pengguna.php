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
    <title>SLB Negeri Cicendo Bandung | Tambah Pengguna</title>
   
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
        <section class="content-header">
           <h1>
            Pengguna
            <small>Tambah Pengguna</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
       <!-- general form elements -->
              <div class="box box-primary">
              
                <!-- form start -->
                <form role="form" method="post" action="../proses.php?proses=create_pengguna">
                  <div class="box-body">
					
				<div class="form-group">
                      <label for="exampleInputEmail1">NIP</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="text" name="nip" class="form-control" id="exampleInputEmail1" placeholder="NIP">
                    </div>
						
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama pengguna</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="text" name="pengguna" class="form-control" id="exampleInputEmail1" placeholder="Nama pengguna">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat Email</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="email" name="emaill" class="form-control" id="exampleInputEmail1" placeholder="alamat email">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Konfirmasi Password</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="password" name="conf_pass" class="form-control" id="confirm_password" placeholder="Konfirmasi password">
                    </div>

                     <div class="form-group">
                      <label>Select</label>
                      <select data-validation="required" data-validation-error-msg="harus diisi" class="form-control" name="jabatan">
                      <option value="">Pilih</option>
                       <?php
                       $sql = mysql_query("SELECT * FROM jabatan");

                       while($r = mysql_fetch_array($sql))
                       {
                         ?>
                          <option value="<?php echo $r['id_jabatan']; ?>"><?php echo $r['nama_jabatan']; ?></option>
                        
                     <?php
                       }   
                     ?>
                       
                       
                      </select>
                    </div>
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
