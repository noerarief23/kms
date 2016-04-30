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
  <title>SLB Negeri Cicendo Bandung | Tambah Forum</title>

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

    <!-- Main content -->
    <section class="content">
     <!-- general form elements -->
     <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Forum</h3>
    
  </div>
<form role="form" method="POST" action="../proses.php?proses=create_forum" class="form-horizontal" enctype="multipart/form-data">
  <div class="box-body">
    
            <!-- /.box-header -->
            <div class="box-body ">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Topik</label>
                  <div class="col-sm-8">
                    <input data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" class="form-control" type="text" name="topik" placeholder="Topik">
                  </div>
               
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Masalah</label>
                  <div class="col-sm-8">
                    <textarea data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" id="editor" name="masalah" placeholder="" rows="10" cols="80"></textarea>
                  </div>
                </div>
                
                <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Tambah</button> 
                  </div>
                
                </div>
              
            </div>
          
  </div>
  </form>
</div>
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
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>


  <script>
    $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
            //bootstrap WYSIHTML5 - text editor
            
          });
  </script>
  </body>
  </html>
