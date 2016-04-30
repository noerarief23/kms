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
    <title>SLB Negeri Cicendo Bandung | Materi</title>
   
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
         
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Materi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                    if (($_SESSION['jabatan'] == 'Guru')||($_SESSION['jabatan'] == 'Kurikulum')) {                    
                ?>  
                <a href="modul_create.php">
                <button class="btn btn-primary btn-flat">Tambah Materi</button>
                </a>
                <?php
                  }
                ?>
                <br>
                <br>

                 <?php  
                 if(isset($_GET['message']))
                 {
                  ?>
                 <div class="alert alert-success alert-dismissable">   
                    <?php
                      if($_GET['message'] == 'success')
                          echo "Materi berhasil disimpan";
                      else if($_GET['message'] == 'success_edit')
                          echo "Materi berhasil diubah";   
                      else if($_GET['message'] == 'success_delete')
                          echo "Materi berhasil dihapus";  
                      else if($_GET['message'] == 'tipe')
                          echo "Tipe file";       
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Materi</th>
                        <th>Pengguna</th>
                        <th width="15%">Aksi</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       $i=0;
                       $sql = mysql_query("SELECT * FROM materi
                                          JOIN user ON materi.id_user=user.id_user ");
if(!$sql)
	echo mysql_error();
                       while($r = mysql_fetch_array($sql))
                       {
                        $i++;
                         ?>
                      <tr>
                         <td> <?php echo $i; ?> </td>
                         <td><?php echo $r['nama_materi']; ?> </td>
                         <td>Ditambahkan oleh: <br><?php echo $r['nama_user']; ?> </td>
                         <td>
                         <?php 
                         if (($_SESSION['id'] == $r['id_user'])||($_SESSION['jabatan'] == 'Kurikulum')) {
                          ?>                          
                              <a href="../<?php echo $r['path']; ?>" title="Download"> <button class="btn bg-blue btn-flat"> <i class="fa fa-download" > </i> </button> </a> 

                              <a href="../proses.php?id=<?php echo $r['id_materi']; ?>&proses=delete_modul" title="hapus" onClick="confirm('Anda yakin menghapus modul ini?')"> <button class="btn bg-red btn-flat"> <i class="fa fa-trash" > </i> </button> </a>

                              <?php
                            }
                            else
                            {
                              ?>
                              <a href="../<?php echo $r['path']; ?>" title="Download"> <button class="btn bg-blue btn-flat"> <i class="fa fa-download" > </i> </button> </a>
                              <?php
                            }
                            ?>
                         </td> 
                      </tr>
                     <?php
                       }   
                     ?>
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
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
