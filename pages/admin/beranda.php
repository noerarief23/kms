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
    <title>SLB Negeri Cicendo Bandung | Beranda</title>
	
   
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

        <?php
          $query = mysql_query("SELECT COUNT(id_pengalaman) as count FROM pengalaman WHERE id_user=".$_SESSION['id']);
          if($query) $qu = mysql_fetch_array($query);
        ?>
         <section class="content-header">
          <h1>
            Beranda         
          </h1>
        
        </section>
         <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
      

        <!-- Main content -->
        <section class="content">
          
          <div class="error-page">
            
                <div class="box-header with-border">
                 
                </div><!-- /.box-header -->
                <div class="box-body">
                <h3>              
                  <table width="100%" cellpadding="30px">
                  <tr >
                        <td width="50%">Nama</td>
                        <td><?php echo $_SESSION['nama_user']; ?></td>
                  </tr> 
                  <tr><td>&nbsp;  </td> </tr>
                  <tr>
                        <td>Jabatan</td>
                        <td><?php echo $_SESSION['jabatan']; ?> </td>
                  </tr> 
                  <tr><td>&nbsp;  </td> </tr>   
                  <tr>
                        <td>Pengalaman yang dibuat</td>
                        <td><?php if($query)echo $qu['count']; else echo "0"; ?> </td>
                  </tr> 
                  </table>
                  </h3>
                </div><!-- /.box-body -->
          
          </div><!-- /.error-page -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



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
