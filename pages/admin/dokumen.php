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
     <title>SLB Negeri Cicendo Bandung | Pelatihan</title>
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
       <!--  <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section> -->

        <!-- Main content -->
        <section class="content">
         
          <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pelatihan</h3>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow-x:scroll;">
                <a href="dokumen_create.php">
                <button class="btn btn-primary btn-flat">Pengalaman Pelatihan Baru</button>
                </a>
                <br>
                <br>

                 <?php  
                 if(isset($_GET['message']))
                 {
                  ?>
                 <div class="alert alert-success alert-dismissable">   
                    <?php
                      if($_GET['message'] == 'success')
                          echo "Data pengalaman berhasil disimpan";
                      else if($_GET['message'] == 'success_edit')
                          echo "Data pengalaman berhasil diubah";   
                      else if($_GET['message'] == 'success_delete')
                          echo "Data pengalaman berhasil dihapus";         
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 
                 <form action="searching_result.php" method="post">

                   <div class="input-group input-group-sm col-lg-6">
                      <input type="text" placeholder="pencarian" name="cari" required class="form-control">
                      <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit">Cari</button>
                      </span>
                    </div><!-- /input-group -->
                  </form><br>
                  <table  class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Pelatihan</th>
                        <th>Tanggal</th> 
                        <th>Pengguna</th>
                        <th width="15%">Aksi</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       $i=0;
                       $sql = mysql_query("SELECT `id_pengalaman`, `nama_pengalaman`, `tgl_pengalaman`, `isi_pengalaman`, us.`nama_user` AS nama FROM `pengalaman` as pe JOIN `user` AS us ON pe.id_user=us.id_user;");

                       while($r = mysql_fetch_array($sql))
                       {
                        $i++;
                         ?>
                      <tr>
                         <td> <?php echo $i; ?> </td>
                         <td><?php echo $r['nama_pengalaman']; ?></td>
                         <td> 
                         <?php 
        		$tgl = date_create($r['tgl_pengalaman']);
        		echo date_format($tgl, "d M Y"); 
        		?> 
                         </td>                         
                              <td width="15%">Ditambahkan oleh: <br> <font color='green'> <?php echo $r['nama']; ?> </font></td>
                            <td> 
                            <a href="dokumen_view.php?id=<?php echo $r['id_pengalaman']; ?>" title="lihat"> <button class="btn bg-navy btn-flat"> <i class="fa fa-folder-open-o" > </i> </button> </a> &nbsp;
                            <?php 
                            $user = $_SESSION['id'];
                            $ko=$r['id_pengalaman'];
                            $k = mysql_query("SELECT *  FROM pengalaman where id_pengalaman=$ko AND id_user=$user");
                            if(mysql_num_rows($k)> 0){
                           ?>

                              <a href="dokumen_edit.php?id=<?php echo $r['id_pengalaman']; ?>" title="edit"> <button class="btn bg-green btn-flat"> <i class="fa fa-edit" > </i> </button> </a> &nbsp;
                              <a href="../proses.php?id=<?php echo $r['id_pengalaman']; ?>&proses=delete_dokumen" title="hapus" onClick="return confirm('Anda yakin menghapus data pengalaman ini ?')"> <button class="btn bg-red btn-flat"> <i class="fa fa-trash" > </i> </button> </a> 

                              <?php } ?>
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
