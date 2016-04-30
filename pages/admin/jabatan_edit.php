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
    <title>SLB Negeri Cicendo Bandung | Ubah Jabatan</title>
   
<?php
    include "../include/style.php";
?>

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
            Jabatan
            <small>Tambah jabatan</small>
          </h1>
         
        </section>
        <?php
            $id = $_GET['id'];

            $query = mysql_query("SELECT * FROM jabatan WHERE id_jabatan=$id");
            $r = mysql_fetch_array($query);
        ?>
        <!-- Main content -->
        <section class="content">
         <!-- Horizontal Form -->
              <div class="box box-info">
              
                <!-- form start -->
                <form class="form-horizontal" method="post" action="../proses.php?proses=edit_jabatan">
                <input type="hidden" name="id" value="<?php echo $r['id_jabatan']; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Jabatan</label>
                      <div class="col-sm-10">
                        <input data-validation="required" data-validation-error-msg="harus diisi" type="text" class="form-control" name="jabatan" id="inputEmail3" value="<?php echo $r['nama_jabatan']; ?>" placeholder="Nama jabatan">
                      </div>
                    </div>                   
                  </div><!-- /.box-body -->
                  <div class="box-footer">                   
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
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

  </body>
</html>
