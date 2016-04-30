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
  <title>SLB Negeri Cicendo Bandung | Ubah Forum</title>

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
        Forum
        <small>Tambah Forum</small>
      </h1>
      
    </section>
<?php
          $id = $_GET['id'];
          $query = mysql_query("SELECT * FROM forum WHERE id_forum=$id");

          $r = mysql_fetch_array($query);

        ?>
    <!-- Main content -->
    <section class="content">
     <!-- general form elements -->
     <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Forum</h3>
    
  </div>
<form role="form" method="POST" action="../proses.php?proses=edit_forum" class="form-horizontal" enctype="multipart/form-data">
  <div class="box-body">
    
            <!-- /.box-header -->
            <div class="box-body ">
              
            
                <input type="hidden" name="id_forum" value="<?php echo $r['id_forum'] ?>">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Topik</label>
                  <div class="col-sm-8">
                    <input data-validation="required" data-validation-error-msg="harus diisi" class="form-control" type="text" name="topik" value="<?php echo $r['topik'] ?>" placeholder="Judul">
                  </div>
               
                </div>
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Masalah</label>
                  <div class="col-sm-8">
                    <textarea data-validation="required" data-validation-error-msg="harus diisi" id="editor1" name="masalah" placeholder="Place some text here" rows="10" cols="80">
                    <?php echo $r['masalah'] ?>
                </textarea>
                  </div>
                </div>
                
                <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Perbaharui</button> 
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
