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
    <title>SLB Negeri Cicendo Bandung | Kata Dasar</title>
   
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
                  <h3 class="box-title">Kata Dasar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <a href="#" data-toggle="modal" data-target="#contact" >
                <button class="btn btn-primary btn-flat">Tambah Kata dasar</button>
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
                          echo "Data kata dasar berhasil disimpan";
                      else if($_GET['message'] == 'success_edit')
                          echo "Data kata dasar berhasil diubah";   
                      else if($_GET['message'] == 'success_delete')
                          echo "Data kata dasar berhasil dihapus";         
                    ?>     
                  </div>
                 <?php
                 }
                 ?> 

                  <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kata</th>
                        <th width="15%">Aksi</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                       $i=0;
                       $sql = mysql_query("SELECT * FROM tb_katadasar limit 5000");

                       while($r = mysql_fetch_array($sql))
                       {
                        $i++;
                         ?>
                      <tr>
                         <td> <?php echo $i; ?> </td>
                         <td><?php echo $r['katadasar']; ?></td>
                         <td>                             
                              <a href="../proses.php?id=<?php echo $r['id_ktdasar']; ?>&proses=delete_katadasar" title="hapus" onClick="confirm('Anda yakin menghapus data kata dasar ini ?')"> <button class="btn bg-red btn-flat"> <i class="fa fa-trash" > </i> </button> </a> 
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
<!-- Modal Dialog Contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Tambah Kata Dasar</h4>
      </div>
      <div class="modal-body">

            <form class="form-horizontal" method="post" action="../proses.php?proses=create_katadasar">
              <div class="box-body">

                <!-- /.box-header -->
                <div class="box-body pad">                 
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Kata</label>
                    <div class="col-sm-5">
                    <input class="form-control" type="text" name="kata" required>
                    </div>                    
                  </div>
                   <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Tipe Kata Dasar</label>
                    <div class="col-sm-5">
                    <select name="tipe" class="form-control" required>
                        <option disabled selected>Pilih tipe kata dasar</option>
                        <option value="Adjektiva" >Adjektiva</option>
                        <option value="Adverbia">Adverbia</option>
                        <option value="Interjeksi" >Interjeksi</option>
                        <option value="Konjungsi" >Konjungsi</option>
                        <option value="Lain-lain">Lain-lain</option>
                        <option value="Nomina">Nomina</option>
                        <option value="Noun" >Noun</option>
                        <option value="Numeralia" >Numeralia</option>
                        <option value="Partikel" >Partikel</option>
                        <option value="Preposisi" >Preposisi</option>
                        <option value="Pronomia">Pronomia</option>
                        <option value="Verba">Verba</option>
                    </select>
                    </div>                    
                  </div>

                 
                </div>

              </div>
            

      </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-default" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


  </body>
</html>
