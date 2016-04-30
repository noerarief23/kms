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
  <title>SLB Negeri Cicendo Bandung | Tambah Jabatan</title>

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
              Jabatan
              <small>Tambah jabatan</small>
            </h1>
          
          </section>

          <!-- Main content -->
          <section class="content">
           <!-- Horizontal Form -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jabatan</h3>

            </div>
            <form class="form-horizontal" method="post" action="../proses.php?proses=create_jabatan">
              <div class="box-body">

                <!-- /.box-header -->
                <div class="box-body pad">


                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-5">
                     <?php 
                    $query = mysql_query("SELECT max(id_jabatan) as id FROM `jabatan`");

                    $r = mysql_fetch_array($query);
                    if(mysql_num_rows($query)> 0){
                   ?>
                      <input class="form-control" type="text" name="id" value="<?php echo $r['id']+1; ?>" disabled>
                      <?php }else{ ?>
                      <input class="form-control" type="text" name="id" value="1" disabled>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nama Jabatan</label>
                    <div class="col-sm-5">
                    <input class="form-control" data-validation="required" data-validation-error-msg="harus diisi" type="text" name="jabatan">
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

  </body>
  </html>
