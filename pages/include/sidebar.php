<?php
function url_aktif($id)
{
  $url_Aktif = $_SERVER["REQUEST_URI"];
  switch ($id) {
    case 'beranda':
      if(strstr($url_Aktif,"beranda"))
        {echo "active treeview";}
      break;
    case 'profil':
      if(strstr($url_Aktif,"profil"))
        {echo "active treeview";}
      break;
    case 'pengguna':
      if(strstr($url_Aktif,"pengguna.php"))
        {echo "active treeview";}
      break;
    case 'pengguna_deactive':
      if(strstr($url_Aktif,"pengguna_deactive"))
        {echo "active treeview";}
      break;
    case 'jabatan':
      if(strstr($url_Aktif,"jabatan"))
        {echo "active treeview";}
      break;
    case 'dokumen':
      if(strstr($url_Aktif,"dokumen"))
        {echo "active treeview";}
      break;
    case 'forum':
      if(strstr($url_Aktif,"forum"))
        {echo "active treeview";}
     break;   
    case 'modul':
      if(strstr($url_Aktif,"modul"))
        {echo "active treeview";}
      break;
  }
}
?>

  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
         
          <div class="user-panel">
            <div class="pull-left-info">
              <font color="white"><?php echo $_SESSION['nama_user']; ?>
              <br><?php echo $_SESSION['jabatan']; ?> </font> 
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class='<?php url_aktif("beranda"); ?>'>
              <a href="beranda.php">
                <i class="fa fa-home"></i> <span>Beranda </span> 
              </a>
            </li>
            <li class='<?php url_aktif("profil"); ?>'>
              <a href="profil.php?id=<?php echo $_SESSION['id'] ?>">
                <i class="fa fa-user"></i> <span>Profil Saya</span> 
              </a>
            </li>  
            <?php                    
                if($_SESSION['jabatan']=='Admin'){
            ?>
            <li class='<?php url_aktif("pengguna"); ?>'>
              <a href="pengguna.php">
                <i class="fa fa-users"></i> <span>Pengguna</span> 
              </a>
            </li>
            <li class='<?php url_aktif("pengguna_deactive"); ?>'>
              <a href="pengguna_deactive.php">
                <i class="fa fa-users"></i> <span>Pengguna Tidak Aktif</span> 
              </a>
            </li>
            <li class='<?php url_aktif("jabatan"); ?>'>
              <a href="jabatan.php">
                <i class="fa fa-th"></i> <span>Jabatan</span> 
              </a>
            </li>
            

             
            <?php
            } 
           
            else{
            ?>            
            <li class='<?php url_aktif("dokumen"); ?>'>
              <a href="dokumen.php">
                <i class="fa fa-newspaper-o"></i> <span>Pelatihan</span> 
              </a>
            </li>

             <li class='<?php url_aktif("forum"); ?>'>
              <a href="forum.php">
                <i class="fa fa-newspaper-o"></i> <span>Forum</span> 
              </a>
            </li>
             <li class='<?php url_aktif("modul"); ?>'>
              <a href="modul.php">
                <i class="fa fa-newspaper-o"></i> <span>Materi</span> 
              </a>
            </li>

             <?php
            } 
            ?>  
            <li>
              <a href="../proses.php?proses=logout">
                <i class="fa fa-sign-out"></i> <span>Keluar</span> 
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>