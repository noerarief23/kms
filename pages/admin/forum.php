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
    <title>SLB Negeri Cicendo Bandung | Forum</title>
   
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
                  <h3 class="box-title">Forum</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <a href="forum_create.php">
                <button class="btn btn-primary btn-flat">Tambah Forum</button>
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
                          echo "Data forum berhasil disimpan";
                      else if($_GET['message'] == 'success_edit')
                          echo "Data forum berhasil diubah";   
                      else if($_GET['message'] == 'success_delete')
                          echo "Data forum berhasil dihapus";         
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 

                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Topik</th>
                        <th>Tanggal</th>
                        <th width="15%">Aksi</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       $i=0;
                       $sql = mysql_query("SELECT * FROM forum");

                       while($r = mysql_fetch_array($sql))
                       {
                        $i++;
                         ?>
                      <tr>
                         <td> <?php echo $i; ?> </td>
                         <td> <a href="forum_show.php?id=<?php echo $r['id_forum']; ?>"><?php echo $r['topik']; ?></a> </td>
                         <td>
                         <?php 
        		$tgl = date_create($r['tgl_forum']);
       			 echo date_format($tgl, "d M Y"); 
       			 ?> 
                         </td>
                         <td> 
                         <?php 
                            $user = $_SESSION['id'];
                            $ko=$r['id_forum'];
                            $k = mysql_query("SELECT *  FROM forum where id_forum=$ko AND id_user=$user");
                            if(mysql_num_rows($k)> 0){
                           ?>

                              <a href="forum_edit.php?id=<?php echo $r['id_forum']; ?>" title="edit"> <button class="btn bg-green btn-flat"> <i class="fa fa-edit" > </i> </button> </a> &nbsp;
                              <a href="../proses.php?id=<?php echo $r['id_forum']; ?>&proses=delete_forum" title="hapus" onClick="confirm('Anda yakin menghapus data forum ini?')"> <button class="btn bg-red btn-flat"> <i class="fa fa-trash" > </i> </button> </a> 

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
