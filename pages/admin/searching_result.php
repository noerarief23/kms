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
    <title>SLB Negeri Cicendo Bandung | Pengalaman</title>
   
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
        <?php
            $cari = $_POST['cari'];
            $kata = explode(' ', $cari);
            $search = array();
            $index = 0;

            foreach ($kata as $key => $value) { //menelusuri setiap kata
                $query = mysql_query("SELECT * FROM keyword JOIN pengalaman ON pengalaman.id_pengalaman=keyword.id_pengalaman JOIN stemming ON id_stemming=id WHERE keyword.kata='$value' OR stemming.kata='$value' ORDER BY bobot DESC");
                if($query == false)
                    echo mysql_error(); 
                while ($r = mysql_fetch_array($query)) { //menelusuri banyaknya pengalaman
                    if($key != 0)  {
                        $found = false;
                        foreach ($search as $key1 => $value1) { //menelusuri hasil cari yg ada
                             if ($search[$key1]['id_pengalaman'] == $r['id_pengalaman']) {
                                  $found = true;
                              } 
                        }

                        if($found == false){
                            $search[$index] = array("id_pengalaman" => $r['id_pengalaman'], "bobot" => $r['bobot'], 'judul' => $r['nama_pengalaman'], "isi" => $r['isi_pengalaman']);    
                            $index++;  
                        }else{
                          //menambahkan bobot
                            foreach ($search as $key2 => $value2) {

                                if($r['id_pengalaman'] == $search[$key2]['id_pengalaman']){
                                     // echo $search[$key2]['bobot'] + $r['bobot'] . "<br>" . $search[$key2]['id_pengalaman'];
                                    $search[$key2]['bobot'] = $search[$key2]['bobot'] + $r['bobot'];                                         
                                }
                            }
                        }

                    }else{
                        $search[$index] = array("id_pengalaman" => $r['id_pengalaman'], "bobot" => $r['bobot'], 'judul' => $r['nama_pengalaman'], "isi" => $r['isi_pengalaman']);     
                         $index++;  
                    }    
                                 
                }
            }
                              
            $tmp = array();

            //sorting pengalaman (bubble sort)
             foreach ($search as $key => $value) {
                  foreach ($search as $key1 => $value1) {
                       if($search[$key]['bobot'] > $search[$key1]['bobot']){
                          $tmp = $search[$key];
                          $search[$key] = $search[$key1];
                          $search[$key1] = $tmp;
                       }
                  } 
             }
           
        ?>

        <!-- Main content -->
        <section class="content">
         <?php
         // print_r($search);
         // foreach ($search as $key => $value) {
         //      echo $search[$key]['id_pengalaman'] . "<br>";
         // }
         ?>
              <!-- row -->
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                  <?php
                      if(count($search) == 0)
                          echo "Tidak ada pengalaman yang ditemukan";
                        else
                          echo "Hasil Pencarian";
                  ?>
                    
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <?php
                foreach ($search as $key => $value) {
                  # code...
                    $find = array();
                    $index = 0;
                    foreach ($kata as $key1 => $value1) {
                        $query = mysql_query("SELECT stemming.kata as kata, bobot , frekuensi FROM keyword JOIN pengalaman ON pengalaman.id_pengalaman=keyword.id_pengalaman JOIN stemming ON id_stemming=id WHERE keyword.kata='$value1' OR stemming.kata='$value1' ORDER BY bobot DESC");
                        if($query == false)
                            echo mysql_error(); 
                          
                        $s = mysql_fetch_array($query);

                        $que = mysql_query("SELECT * FROM stemming WHERE id_pengalaman=" . $search[$key]['id_pengalaman'] . " AND kata='" . $s['kata']."'");

                        if(mysql_num_rows($que) != '0'){
                          $find[$index] = " " .$s['kata'] . " (" . $s['frekuensi'] . " kali) (bobot = " . $s['bobot'] . ")";
                          $index++;
                        }
                    }
                    
                    $word = implode(",", $find); 

                ?>
                <li>
                  <i class="fa fa-file bg-blue"></i>
                  <div class="timeline-item">
                    <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
                    <div class="timeline-header">
                        <h4 ><?php echo $search[$key]['judul']; ?>  <!--(--> <?php// echo $search[$key]['bobot']; ?> <!--)--></h4>
                        <?php
                            //echo $word;
                        ?> 
                    </div>
                   

                    <div class="timeline-body">
                      <?php
                        echo $search[$key]['isi'];
                      ?>
                    </div>
                    <!-- <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div> -->
                  </div>
                </li>
                <?php
                }
                ?>
                
                <!-- END timeline item -->
              
                <!-- END timeline item -->
             
              <!--   <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li> -->
              </ul>
            </div><!-- /.col -->
          </div><!-- /.row --> 

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
