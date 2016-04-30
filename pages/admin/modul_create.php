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
    <title>SLB Negeri Cicendo Bandung | Tambah Modul</title>
   
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
            Modul
            <small>Tambah Modul</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
         <!-- general form elements -->
              <div class="box box-primary">               
                <!-- form start -->
                <div class="box-body">
                 <?php  
                 if(isset($_GET['message']))
                 {
                  ?>
                 <div class="alert alert-danger alert-dismissable">   
                    <?php
                          if($_GET['message'] == 'tipe')
                          echo "Tipe file tidak didukung. Hanya file .doc, .docx, .xls, .xlsx .ppt, .pptx, .pdf";         
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 

                <form role="form" method="post" action="../proses.php?proses=create_modul" enctype='multipart/form-data'>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Materi</label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Materi">
                    </div>
                 
                    <div class="form-group">
                      <label for="exampleInputFile">File </label>
                      <input data-validation="required" data-validation-error-msg="harus diisi" type="file" name="file" id="exampleInputFile">                      
                    </div>      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
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
