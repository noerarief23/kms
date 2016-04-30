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
    <title>SLB Negeri Cicendo Bandung | Ubah Pengalaman</title>
   
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
            Pengalaman
            <small>Perbaharui Pengalaman</small>
          </h1>
        
        </section>
        <?php
          $id = $_GET['id'];

          $query = mysql_query("SELECT * FROM pengalaman WHERE id_pengalaman=$id");

          $r = mysql_fetch_array($query);

        ?>

        <!-- Main content -->
        <section class="content">
       <!-- general form elements -->
              <div class="box box-primary">              
                <!-- form start -->
                <form role="form" method="post" action="../proses.php?proses=edit_dokumen">
                  <div class="box-body">
                  <input type="hidden" name="id" value="<?php echo $r['id_pengalaman'] ?>">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pengalaman</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="text" name="dokumen" class="form-control" id="exampleInputEmail1" value="<?php echo $r['nama_pengalaman'] ?>" placeholder="Nama pengalaman">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Isi Pengalaman</label>
                      <textarea data-validation="required" data-validation-error-msg="harus diisi" class="form-control" placeholder="isi pengalaman" name="isi"><?php echo $r['isi_pengalaman'] ?></textarea>
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


  </body>
</html>
