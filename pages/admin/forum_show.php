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
  <title>SLB Negeri Cicendo Bandung | Topik</title>

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
      
    <?php
    $id = $_GET['id'];
    $query = mysql_query("SELECT * FROM forum WHERE id_forum=$id");

    $r = mysql_fetch_array($query);

    ?>
    <!-- Main content -->
    <section class="content"><div class="box box-primary">
      <div class="box-header with-border">
        <h2 class="box-title"><?php echo $r['topik'] ?></h2><br>
        <span class="time"><i class="fa fa-clock-o"></i>
        <?php 
        $tgl = date_create($r['tgl_forum']);
        echo date_format($tgl, "d M Y"); 
        ?> 
        <i class="fa fa-user-o"></i></span>
      </div>
      <div class="box-body">

        <?php echo $r['masalah'] ?>

        <form method="POST" action="../proses.php?proses=create_komentar">
          
          <input type="hidden" name="id_forum" value="<?php echo $r['id_forum'] ?>">
          
          <div class="form-group">
            <textarea class="form-control" data-validation="required" data-validation-error-msg="Harap isi data terlebih dahulu" name="komentar"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Tambah Komentar</button>
          </div>


        </form>
      </div>
    </div>
     <h3>Jawaban :</h3>
<?php 
    $id = $_GET['id'];
    $query = mysql_query("SELECT komentar.id_forum, komentar.id_user, komentar.id_komentar, komentar.isi_komentar, 
      (select count(tb_like.id_komentar) from tb_like where tb_like.id_komentar=komentar.id_komentar 
        group by tb_like.id_komentar) as jml FROM `komentar` where id_forum =$id order by jml desc");
     while($r = mysql_fetch_array($query))
    {
?>
 
  
    <div class="box box-default">
    <div class="box-tools pull-right">
    <?php $user = $_SESSION['id'];
      if($user == $r['id_user'])
      {
           ?>
           <form method="post" action="../proses.php?proses=hapus_komentar" onSubmit="return confirm('Apakah anda yakin akan menghapus komentar?')">
           <input type="hidden" name="id_forum" value="<?php echo $id; ?>">
           <input type="hidden" name="id_komentar" value="<?php echo $r['id_komentar']; ?>">
           <button type="submit" role="button" class="btn btn-primary"><i class="fa fa-times"></i></button>
      
      </form>
      <?php } ?>
    </div>
      <div class="box-body">
        <div class="col-md-1">
        <center>
        <section>
        <?php 
          $user = $_SESSION['id'];
          $ko=$r['id_komentar'];
          $k = mysql_query("SELECT *  FROM `tb_like` where id_komentar=$ko AND id_user=$user");
          if(mysql_num_rows($k)> 0){
         ?>
         <form action="../proses.php?proses=drop_like" method="post">
          
          <input type="hidden" name="id_komentar" value="<?php echo $r['id_komentar']; ?>">
          <input type="hidden" name="id_forum" value="<?php echo $r['id_forum']; ?>">
          <button type="submit" class="btn bg-blue "><i class="fa fa-thumbs-up fa-3x"></i></button>
        </form>
          <?php } else { ?>
          <form action="../proses.php?proses=create_like" method="post">
          
          <input type="hidden" name="id_komentar" value="<?php echo $r['id_komentar']; ?>">
          <input type="hidden" name="id_forum" value="<?php echo $r['id_forum']; ?>">
          <button type="submit" class="btn"><i class="fa fa-thumbs-up fa-3x"></i></button>
        </form>
       
        <?php } ?>
        </section>
        <section>
        
    <font size="4">
        
        <?php 
        $id_k = $r['id_komentar'];
          $komentar = mysql_query("SELECT count(id_komentar) as jml FROM `tb_like` where id_komentar=$id_k");
          $tam = mysql_fetch_array($komentar);
           echo $tam['jml'] ; 
        
         ?>
          </font>
        </section>
        </center>
        </div>
        <div class="col-md-11">
          <p><?php echo $r['isi_komentar']; ?></p>
        </div>  
        <br>oleh : <?php
        $id_user = $r['id_user'];
         $us = mysql_query("SELECT nama_user FROM `user` where id_user=$id_user");
        $u = mysql_fetch_array($us);
         echo $u['nama_user'] ; 
         ?>
      </div>
      
    </div>
  <?php } ?>
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
