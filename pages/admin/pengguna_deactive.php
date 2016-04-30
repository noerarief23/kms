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
    <title>SLB Negeri Cicendo Bandung | Pengguna</title>
   
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
                  <h3 class="box-title">Pengguna</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-x:scroll;">

                 <?php  
                 if(isset($_GET['message']))
                 {
                  ?>
                 <div class="alert alert-success alert-dismissable">   
                    <?php
                      if($_GET['message'] == 'success')
                          echo "Data pengguna berhasil disimpan";
                      else if($_GET['message'] == 'success_edit')
                          echo "Data pengguna berhasil diubah";   
                      else if($_GET['message'] == 'success_delete')
                          echo "Data pengguna berhasil dihapus";         
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>NIP</th>
                        <th>Nama Pengguna</th>
                        <th>Email </th>
                        <th>Jabatan</th>
                        <th width="15%">Aksi</th>                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       $i=0;
                       $sql = mysql_query("SELECT * FROM user WHERE active=0");

                       while($r = mysql_fetch_array($sql))
                       {
                        $i++;
                         ?>
                      <tr>
                         <td> <?php echo $i; ?> </td>
						 <td><?php echo $r['nip']; ?></td>
                         <td><?php echo $r['nama_user']; ?></td>
                         <td><?php echo $r['email']; ?></td>
                         <td> <?php
                         $jab=$r['jabatan_id'];
                          $queryj = mysql_query("SELECT * FROM jabatan WHERE id_jabatan=$jab");
                          $j = mysql_fetch_array($queryj);
                          echo $j['nama_jabatan']; ?> </td>  
                         <td> 
                              <a href="edit_pengguna.php?id=<?php echo $r['id_user']; ?>" title="edit"> <button class="btn bg-yellow btn-flat"> <i class="fa fa-edit" > </i> </button> </a> &nbsp;
                              <a href="../proses.php?id=<?php echo $r['id_user']; ?>&proses=active_pengguna" title="Active" onClick="return confirm('Anda yakin mengaktifkan data pengguna ini ?')"> <button class="btn bg-green btn-flat"> <i class="fa fa-user-plus" > </i> </button> </a> 
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
