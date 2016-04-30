<?php
session_start();
  include "koneksi.php";
  require_once ('../plugins/phpmail/PHPMailerAutoload.php');

$gak_penting = array("a", "about", "above", "acara", "across", "ada", "adalah", "adanya", "after", "afterwards", "again", "against", "agar", "akan", "akhir", "akhirnya", "akibat", "aku", "all", "almost", "alone", "along", "already", "also", "although", "always", "am", "among", "amongst", "amoungst", "amount", "an", "and", "anda", "another", "antara", "any", "anyhow", "anyone", "anything", "anyway", "anywhere", "apa", "apakah", "apalagi", "are", "around", "as", "asal", "at", "atas", "atau", "awal", "b", "back", "badan", "bagaimana", "bagi", "bagian", "bahkan", "bahwa", "baik", "banyak", "barang", "barat", "baru", "bawah", "be", "beberapa", "became", "because", "become", "becomes", "becoming", "been", "before", "beforehand", "begitu", "behind", "being", "belakang", "below", "belum", "benar", "bentuk", "berada", "berarti", "berat", "berbagai", "berdasarkan", "berjalan", "berlangsung", "bersama", "bertemu", "besar", "beside", "besides", "between", "beyond", "biasa", "biasanya", "bila", "bill", "bisa", "both", "bottom", "bukan", "bulan", "but", "by", "call", "can", "cannot", "cant", "cara", "co", "con", "could", "couldnt", "cry", "cukup", "dalam", "dan", "dapat", "dari", "datang", "de", "dekat", "demikian", "dengan", "depan", "describe", "detail", "di", "dia", "diduga", "digunakan", "dilakukan", "diri", "dirinya", "ditemukan", "do", "done", "down", "dua", "due", "dulu", "during", "each", "eg", "eight", "either", "eleven", "else", "elsewhere", "empat", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "gedung", "get", "give", "go", "had", "hal", "hampir", "hanya", "hari", "harus", "has", "hasil", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "hidup", "him", "himself", "hingga", "his", "how", "however", "hubungan", "hundred", "ia", "ie", "if", "ikut", "in", "inc", "indeed", "ingin", "ini", "interest", "into", "is", "it", "its", "itself", "itu", "jadi", "jalan", "jangan", "jauh", "jelas", "jenis", "jika", "juga", "jumat", "jumlah", "juni", "justru", "juta", "kalau", "kali", "kami", "kamis", "karena", "kata", "katanya", "ke", "kebutuhan", "kecil", "kedua", "keep", "kegiatan", "kehidupan", "kejadian", "keluar", "kembali", "kemudian", "kemungkinan", "kepada", "keputusan", "kerja", "kesempatan", "keterangan", "ketiga", "ketika", "khusus", "kini", "kita", "kondisi", "kurang", "lagi", "lain", "lainnya", "lalu", "lama", "langsung", "lanjut", "last", "latter", "latterly", "least", "lebih", "less", "lewat", "lima", "ltd", "luar", "made", "maka", "mampu", "mana", "mantan", "many", "masa", "masalah", "masih", "masing-masing", "masuk", "mau", "maupun", "may", "me", "meanwhile", "melakukan", "melalui", "melihat", "memang", "membantu", "membawa", "memberi", "memberikan", "membuat", "memiliki", "meminta", "mempunyai", "mencapai", "mencari", "mendapat", "mendapatkan", "menerima", "mengaku", "mengalami", "mengambil", "mengatakan", "mengenai", "mengetahui", "menggunakan", "menghadapi", "meningkatkan", "menjadi", "menjalani", "menjelaskan", "menunjukkan", "menurut", "menyatakan", "menyebabkan", "menyebutkan", "merasa", "mereka", "merupakan", "meski", "might", "milik", "mill", "mine", "minggu", "misalnya", "more", "moreover", "most", "mostly", "move", "much", "mulai", "muncul", "mungkin", "must", "my", "myself", "nama", "name", "namely", "namun", "nanti", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "oleh", "on", "once", "one", "only", "onto", "or", "orang", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own", "pada", "padahal", "pagi", "paling", "panjang", "para", "part", "pasti", "pekan", "penggunaan", "penting", "per", "perhaps", "perlu", "pernah", "persen", "pertama", "pihak", "please", "posisi", "program", "proses", "pula", "pun", "punya", "put", "rabu", "rasa", "rather", "re", "ribu", "ruang", "saat", "sabtu", "saja", "salah", "sama", "same", "sampai", "sangat", "satu", "saya", "sebab", "sebagai", "sebagian", "sebanyak", "sebelum", "sebelumnya", "sebenarnya", "sebesar", "sebuah", "secara", "sedang", "sedangkan", "sedikit", "see", "seem", "seemed", "seeming", "seems", "segera", "sehingga", "sejak", "sejumlah", "sekali", "sekarang", "sekitar", "selain", "selalu", "selama", "selasa", "selatan", "seluruh", "semakin", "sementara", "sempat", "semua", "sendiri", "senin", "seorang", "seperti", "sering", "serious", "serta", "sesuai", "setelah", "setiap", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "suatu", "such", "sudah", "sumber", "system", "tahu", "tahun", "tak", "take", "tampil", "tanggal", "tanpa", "tapi", "telah", "teman", "tempat", "ten", "tengah", "tentang", "tentu", "terakhir", "terhadap", "terjadi", "terkait", "terlalu", "terlihat", "termasuk", "ternyata", "tersebut", "terus", "terutama", "tetapi", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thickv", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "tidak", "tiga", "tinggal", "tinggi", "tingkat", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "ujar", "umum", "un", "under", "until", "untuk", "up", "upaya", "upon", "us", "usai", "utama", "utara", "very", "via", "waktu", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "wib", "will", "with", "within", "without", "would", "ya", "yaitu", "yakni", "yang", "yet", "you", "your", "yours", "yourself", "yourselves");
      $symbol = array(",", ".", "/", "?", "<", ">", ":",";","'","{","[", "}", "]", "=", "+", "_", "-",")", "(", '"');
      $alphas = range('a', 'z');
  
  switch ($_GET['proses']) {  
    case 'login':
      $username = $_POST['email'];
      $password = $_POST['password'];
      
      $login = mysql_query("SELECT * FROM user WHERE email='$username' AND password=md5('$password') AND active=1");      
      
      if(mysql_num_rows($login) > '0')
      {
        $r = mysql_fetch_array($login);

        session_start();
        $id_j = $r['jabatan_id']; 
        $jabatan  = mysql_query("SELECT * FROM jabatan where id_jabatan=$id_j");
        $s = mysql_fetch_array($jabatan);

        $_SESSION['jabatan'] = $s['nama_jabatan'];
        $_SESSION['nama_user'] = $r['nama_user'];         
        $_SESSION['id'] = $r['id_user'];
        $_SESSION['status'] = TRUE;
        
        header("location:admin/beranda.php");
      } 
      else
        header("location:login.php?message=login_failed");
      
    break;  

    case 'logout':
        session_start();

        $_SESSION['jabatan'] = FALSE;
        $_SESSION['nama_user'] = FALSE;         
        $_SESSION['id'] = FALSE;
        $_SESSION['status'] = FALSE;

        session_destroy();  
        header("Location:login.php");
    break;  

    case 'create_katadasar':
      $query = mysql_query("INSERT INTO tb_katadasar (katadasar,tipe_katadasar ,id_user) VALUES ('" . $_POST['kata'] . "', '" . $_POST['tipe'] . "' ," . $_SESSION['id'] . ")");

      if($query)
        header("Location:admin/katadasar.php?message=success");
      else
        echo mysql_error();    

    break;  

    case 'delete_katadasar':
      $query = mysql_query("DELETE FROM tb_katadasar WHERE id_ktdasar=" . $_GET['id']);

      if($query)
        header("Location:admin/katadasar.php?message=success_delete");
      else
        echo mysql_error();    

    break;  

    case 'create_jabatan':
      $query = mysql_query("INSERT INTO jabatan (nama_jabatan) VALUES ('" . $_POST['jabatan'] . "')");

      if($query)
        header("Location:admin/jabatan.php?message=success");
      else
        echo mysql_error();    

    break;  

    case 'edit_jabatan':      
      $query = mysql_query("UPDATE jabatan SET nama_jabatan='" . $_POST['jabatan'] . "' WHERE id_jabatan=" . $_POST['id']);

      if($query)
        header("Location:admin/jabatan.php?message=success_edit");
      else
        echo mysql_error();    

    break;  

    case 'delete_jabatan':
      $query = mysql_query("DELETE FROM jabatan WHERE id_jabatan=" . $_GET['id']);

      if($query)
        header("Location:admin/jabatan.php?message=success_delete");
      else
        echo mysql_error();    

    break;  

    case 'create_pengguna':
      $nip = $_POST['nip'];
      $nama = $_POST['pengguna'];
      $email = $_POST['emaill'];
      $password = $_POST['password'];
      $conf_pass = $_POST['conf_pass'];
      $jabatan = $_POST['jabatan'];

      $query = mysql_query("INSERT INTO user (nip,nama_user,email,password, jabatan_id) VALUES ('$nip','$nama', '$email', md5('$password'), $jabatan)");

      if($query)
        header("Location:admin/pengguna.php?message=success");
      else
        echo mysql_error();    

    break;  

    case 'edit_pengguna':
      $id = $_POST['id'];
      $nip = $_POST['nip'];
      $nama = $_POST['pengguna'];
      $email = $_POST['emaill'];
      $password = $_POST['password'];
      $conf_pass = $_POST['conf_pass'];
      $jabatan = $_POST['jabatan'];
	  $filegambar=$_FILES['foto']['name'];
	  $namafilebaru="../img/profil/".$filegambar;
	  move_uploaded_file($_FILES['filegambar']['tmp_name'],$namafilebaru);

      if($password)
        $query = mysql_query("UPDATE user SET nip='$nip',nama_user='$nama', email='$email', password=md5('$password'), jabatan_id=$jabatan, foto='$filegambar' WHERE id_user=$id");        
      else
        $query = mysql_query("UPDATE user SET nip='$nip',nama_user='$nama', email='$email', jabatan_id=$jabatan, foto='$filegambar' WHERE id_user=$id");

      if($query)
        header("Location:admin/pengguna.php?message=success_edit");
      else
        echo mysql_error();    
		
    break;  

    case 'deactive_pengguna':
      $id = $_GET['id'];
      $query = mysql_query("UPDATE user SET active=0 WHERE id_user=$id");

      if($query)
        header("Location:admin/pengguna.php?message=success_deactive");
      else
        echo mysql_error();     

    break;

    case 'active_pengguna':
      $id = $_GET['id'];
      $query = mysql_query("UPDATE user SET active=1 WHERE id_user=$id");

      if($query)
        header("Location:admin/pengguna.php?message=success_active");
      else
        echo mysql_error();     

    break;

    case 'delete_pengguna':
      $id = $_GET['id'];
      $query = mysql_query("DELETE FROM user WHERE id_user=$id");

      if($query)
        header("Location:admin/pengguna.php?message=success_delete");
      else
        echo mysql_error();     

    break;

    case 'edit_modul':      
      $query = mysql_query("UPDATE modul_knowledege SET nama_jabatan='" . $_POST['jabatan'] . "' WHERE id_jabatan=" . $_POST['id']);

      if($query)
        header("Location:admin/modul.php?message=success_edit");
      else
        echo mysql_error();    

    break;  

    case 'create_dokumen':
      include ('stemming-nazief-adriani.php'); // ambil script stemming-nazief-adriani.php

      $dokumen = $_POST['dokumen'];
      $isi = $_POST['isi'];
      $user = $_SESSION['id'];
      
      $query = mysql_query("INSERT INTO pengalaman (nama_pengalaman, tgl_pengalaman, isi_pengalaman, id_user) VALUES ('$dokumen', NOW(), " . '"' . $isi . '"' . ",$user)");
      if($query == FALSE)
        echo mysql_error(); 
      $id_pengalaman = mysql_query("SELECT max(id_pengalaman) as id, count(id_pengalaman) as jum FROM pengalaman");
      $r = mysql_fetch_array($id_pengalaman);
      $id_pengalaman = $r['id'];
      $D = $r['jum'];

      
      $fix = array(); //variabel penyimpan kata yg sudah dibuang karakternya
      $index = 0;

      $pengalaman = explode(" ", $isi);

      //mengecilkan huruf
      foreach ($pengalaman as $key => $value) {
        $pengalaman[$key] = strtolower($pengalaman[$key]);
      }

      //menelusuri semua kata
      foreach ($pengalaman as $key => $value) {       
        $found = FALSE;
        $i = 0;

        //mengecek apakah ini adalah kata gak penting
        while (($found == false) && ($i < count($gak_penting))) {
          if($value == $gak_penting[$i])
          {
            $found = TRUE;
          }
          $i++;
        }

        if($found == FALSE)
        {
          $a = str_split($value); //memecah karakter
          $kar = "";
          $fndChar = FALSE; //

          //menelusuri karakter
          foreach ($a as $key1 => $value1) {            
            $fnd = FALSE; // variabel penyimpan ada tidak nya simbol
            

            //membuang symbol
            foreach ($symbol as $key2 => $value2) {
              if($value1 == $value2)
                $fnd = TRUE;
            }

            //apakah ada karakternya atau tidak
            foreach ($alphas as $key3 => $value3) {
              if($value3 == $value1)
                $fndChar = TRUE;
            }

            if($fnd == FALSE)
            {
              $kar = $kar . $value1;
            }

          }

          if($fndChar) //apakah mengandung huruf atau tidak
          {
            $fix[$index] = $kar;
            $kata_dasar = Nazief_Adriani(trim($fix[$index]));

            $df = mysql_query("SELECT count(id) as df FROM keyword WHERE kata='$kata_dasar'"); //menghitung berapa banyak kata ini di tabel keyword
            if($df == FALSE)
                echo mysql_error();
            $f = mysql_fetch_array($df);

            if($f['df'] != 0)
              $IDF = log10($D/$f['df']);
            else
              $IDF = log10($D/1);

            // update or input ke keyword
            $cek_keyword = mysql_query("SELECT * FROM keyword WHERE id_pengalaman=$id_pengalaman AND kata='$kata_dasar'");

            if(mysql_num_rows($cek_keyword) != '0')
            { 
              $que = mysql_query("UPDATE keyword SET frekuensi=frekuensi+1 WHERE id_pengalaman=$id_pengalaman AND kata='$kata_dasar'");
              $token = mysql_query("UPDATE token SET frekuensi=frekuensi+1 WHERE id_pengalaman=$id_pengalaman AND token='$kar'");
              if($que == FALSE)
                echo mysql_error(); 
            }else{
              
              $que = mysql_query("INSERT INTO stemming (id_pengalaman,kata,kata_dasar) VALUES ($id_pengalaman,'" . $fix[$index] . "','$kata_dasar')");  
              if($que == FALSE)
                echo mysql_error();

              $que = mysql_query("INSERT INTO token (id_pengalaman,token,frekuensi) VALUES ($id_pengalaman,'" . $kar . "',1)"); 
              if($que == FALSE)
                echo mysql_error();

              $que = mysql_query("INSERT INTO keyword (id_pengalaman,kata,frekuensi) VALUES ($id_pengalaman,'$kata_dasar',1)");
              if($que == FALSE)
                echo mysql_error();
            } 
          
            $index++;
          }

        }
        
      }
      $a = mysql_query("SELECT count(distinct(id_pengalaman)) as D_nilai FROM keyword");
          $b = mysql_fetch_array($a);
          $c = $b['D_nilai'];
      $k = mysql_query("SELECT DISTINCT(kata) as D_kata FROM keyword");
          //$isikata = mysql_fetch_array($k);
          
          while($row = mysql_fetch_array($k))
          { 
              $e = mysql_query("SELECT COUNT(DISTINCT(id)) AS df  FROM keyword WHERE kata='$row[D_kata]'");
              $f = mysql_fetch_array($e);
              $g = $f['df'];
              if($f['df'] != 0)
              $IDF = log10($c/$g);
              else
              $IDF = log10($c/1); 
           $bobot = mysql_query("UPDATE keyword SET bobot=$IDF WHERE kata='$row[D_kata]'"); 

          } 
          
      header("Location:admin/dokumen.php?message=success");         

    break;

  case 'edit_dokumen':
      $dokumen = $_POST['dokumen'];
      $isi = $_POST['isi'];
      $id = $_POST['id'];
      $user = $_SESSION['id'];
      
      $query = mysql_query("UPDATE pengalaman SET nama_pengalaman='$dokumen', tgl_pengalaman=NOW(), isi_pengalaman='$isi', id_user=$user WHERE id_pengalaman=$id");

      $delete_keyword = mysql_query("DELETE FROM keyword WHERE id_pengalaman=" . $id);
      $delete_token = mysql_query("DELETE FROM token WHERE id_pengalaman=" . $id);
      $delete_stemming = mysql_query("DELETE FROM stemming WHERE id_pengalaman=" . $id);

      $id_pengalaman = mysql_query("SELECT count(id_pengalaman) as jum FROM pengalaman");
      $r = mysql_fetch_array($id_pengalaman);
      $id_pengalaman = $id;
      $D = $r['jum'];
      
      $fix = array(); //variabel penyimpan kata yg sudah dibuang karakternya
      $index = 0;

      $pengalaman = explode(" ", $isi);

      //mengecilkan huruf
      foreach ($pengalaman as $key => $value) {
        $pengalaman[$key] = strtolower($pengalaman[$key]);
      }

      //menelusuri semua kata
      foreach ($pengalaman as $key => $value) {       
        $found = FALSE;
        $i = 0;

        //mengecek apakah ini adalah kata gak penting
        while (($found == false) && ($i < count($gak_penting))) {
          if($value == $gak_penting[$i])
          {
            $found = TRUE;
          }
          $i++;
        }

        if($found == FALSE)
        {
          $a = str_split($value); //memecah karakter
          $kar = "";
          $fndChar = FALSE; //

          //menelusuri karakter
          foreach ($a as $key1 => $value1) {            
            $fnd = FALSE; // variabel penyimpan ada tidak nya simbol
            

            //membuang symbol
            foreach ($symbol as $key2 => $value2) {
              if($value1 == $value2)
                $fnd = TRUE;
            }

            //apakah ada karakternya atau tidak
            foreach ($alphas as $key3 => $value3) {
              if($value3 == $value1)
                $fndChar = TRUE;
            }

            if($fnd == FALSE)
            {
              $kar = $kar . $value1;
            }

          }

          if($fndChar) //apakah mengandung huruf atau tidak
          {
            $fix[$index] = $kar;
            $kata_dasar = Nazief_Adriani(trim($fix[$index]));

            $df = mysql_query("SELECT count(id) as df FROM keyword WHERE kata='$kata_dasar'"); //menghitung berapa banyak kata ini di tabel keyword
            if($df == FALSE)
                echo mysql_error();
            $f = mysql_fetch_array($df);

            if($f['df'] != 0)
              $IDF = log10($D/$f['df']);
            else
              $IDF = log10($D/1);

            // update or input ke keyword
            $cek_keyword = mysql_query("SELECT * FROM keyword WHERE id_pengalaman=$id_pengalaman AND kata='$kata_dasar'");

            if(mysql_num_rows($cek_keyword) != '0')
            { 
              $cek_kt_dasar = mysql_query("SELECT * FROM tb_katadasar WHERE katadasar='$kata_dasar'"); //mengecek apakah ada kata ini di tb_katadasar 
              if(mysql_num_rows($cek_kt_dasar) != '0')
              {
                $que = mysql_query("UPDATE keyword SET frekuensi=frekuensi+1 WHERE id_pengalaman=$id_pengalaman AND kata='$kata_dasar'");
              }
              
              $token = mysql_query("UPDATE token SET frekuensi=frekuensi+1 WHERE id_pengalaman=$id_pengalaman AND token='$kar'");
              if($que == FALSE)
                echo mysql_error(); 
            }else{
              $cek_kt_dasar = mysql_query("SELECT * FROM tb_katadasar WHERE katadasar='$kata_dasar'"); //mengecek apakah ada kata ini di tb_katadasar
              if(mysql_num_rows($cek_kt_dasar) != '0')
              { 
                $kl = mysql_fetch_array($cek_kt_dasar);
                $k = $kl['id_ktdasar'];
                $que = mysql_query("INSERT INTO stemming (id_pengalaman,kata,kata_dasar, id_katadasar) VALUES ($id_pengalaman,'" . $fix[$index] . "','$kata_dasar',$k)"); 
                if($que == FALSE)
                  echo mysql_error();
                
                $que = mysql_query("INSERT INTO keyword (id_pengalaman,kata,frekuensi) VALUES ($id_pengalaman,'$kata_dasar',1)");
                if($que == FALSE)
                  echo mysql_error();
              }

              $que = mysql_query("INSERT INTO token (id_pengalaman,token,frekuensi) VALUES ($id_pengalaman,'" . $kar . "',1)"); 
              if($que == FALSE)
                echo mysql_error();             
            } 
          
            $index++;
          }

        }
        
      }
      $a = mysql_query("SELECT count(distinct(id_pengalaman)) as D_nilai FROM keyword");
          $b = mysql_fetch_array($a);
          $c = $b['D_nilai'];
      $k = mysql_query("SELECT DISTINCT(kata) as D_kata FROM keyword");
          //$isikata = mysql_fetch_array($k);
          
      while($row = mysql_fetch_array($k))
      { 
        $e = mysql_query("SELECT COUNT(DISTINCT(id)) AS df  FROM keyword WHERE kata='$row[D_kata]'");
        $f = mysql_fetch_array($e);
        $g = $f['df'];
        if($f['df'] != 0)
          $IDF = log10($c/$g);
        else
          $IDF = log10($c/1); 
        $bobot = mysql_query("UPDATE keyword SET bobot=$IDF WHERE kata='$row[D_kata]'");  

      } 

      if($query)
        header("Location:admin/dokumen.php?message=success_edit");
      else
        echo mysql_error();     

    break;  


    case 'delete_dokumen':
      $query = mysql_query("DELETE FROM pengalaman WHERE id_pengalaman=" . $_GET['id']);
      $query = mysql_query("DELETE FROM keyword WHERE id_pengalaman=" . $_GET['id']);

      if($query)
        header("Location:admin/dokumen.php?message=success_delete");
      else
        echo mysql_error();     
    break;  


    case 'create_modul':      
      $nama = $_POST['nama'];
      $user = $_SESSION['id'];
      $atipe = $_FILES['file']['type'];
      $nama_gambar = $_FILES['file']['name'];
      $tipe = pathinfo($nama_gambar,PATHINFO_EXTENSION);
      // echo $tipe;

      if($tipe != "pdf" && $tipe != "doc" && $tipe != "docx" && $tipe != "xls" && $tipe != "xlsx" && 
        $tipe != "ppt" && $tipe != "pptx" ){
        header("Location:admin/modul_create.php?message=tipe");
        
      }else{
        $gambar = "../file/" . basename($_FILES['file']['name']);

        move_uploaded_file($_FILES['file']['tmp_name'], $gambar);
        
        $query = mysql_query("INSERT INTO materi (nama_materi, path, tgl_materi, id_user) VALUES ('$nama', '$gambar' , NOW() ,$user)");

        if($query)
          header("Location:admin/modul.php?message=success");
        else
          echo mysql_error();
      }
            

    break;

    case 'delete_modul':
      $query = mysql_query("DELETE FROM materi WHERE id_materi=" . $_GET['id']);

      if($query)
        header("Location:admin/modul.php?message=success_delete");
      else
        echo mysql_error();     
    break;  


    case 'create_forum':
      $topik = $_POST['topik'];
      $masalah = $_POST['masalah'];
      
      $user = $_SESSION['id'];
      
      $query = mysql_query("INSERT INTO forum (topik, masalah, tgl_forum, id_user) VALUES ('$topik','$masalah', NOW(),$user)");

      if($query)
        header("Location:admin/forum.php?message=success");
      else
        echo mysql_error();     

    break;

    case 'edit_forum':
      $topik = $_POST['topik'];
      $masalah = $_POST['masalah'];
      $id = $_POST['id_forum'];
      $user = $_SESSION['id'];
      
      $query = mysql_query("UPDATE forum SET topik='$topik', tgl_forum=NOW(), masalah='$masalah', id_user=$user WHERE id_forum=$id");

      if($query)
        header("Location:admin/forum.php?message=success_edit");
      else
        echo mysql_error();     

    break;  

    case 'delete_forum':
      $query = mysql_query("DELETE FROM forum WHERE id_forum=" . $_GET['id']);

      if($query)
        header("Location:admin/forum.php?message=success_edit");
      else
        echo mysql_error();     

    break;

    // Komentar

    case 'create_komentar':
      $komentar = $_POST['komentar'];
      $id_forum = $_POST['id_forum'];
      
      $user = $_SESSION['id'];
      
      $query = mysql_query("INSERT INTO komentar (isi_komentar, tgl_komentar, id_user, id_forum) VALUES ('$komentar', NOW(),$user,$id_forum)");

      if($query)
        header("Location:admin/forum_show.php?id=$id_forum");
      else
        echo mysql_error();     
    break;

    case 'create_like':
      $id_komentar = $_POST['id_komentar'];
      $id_forum = $_POST['id_forum'];
      
      $user = $_SESSION['id'];
      
      $query = mysql_query("INSERT INTO tb_like (id_komentar,id_user) VALUES ($id_komentar,$user)");

      if($query){
        header("Location:admin/forum_show.php?id=".$id_forum);
      }
      else
        echo mysql_error();
    break;

    case 'drop_like':
      $id_komentar = $_POST['id_komentar'];
      $id_forum = $_POST['id_forum'];
      
      $user = $_SESSION['id'];
      
      
      $query = mysql_query("DELETE FROM tb_like WHERE id_komentar=$id_komentar and id_user=$user");
      // if($query)
        // http_build_query($query)
      if($query){
        header("Location:admin/forum_show.php?id=$id_forum");
      }else{
        echo mysql_error(); 
      }

    break;

    case 'hapus_komentar':
      $id_komentar = $_POST['id_komentar'];
      $id_forum = $_POST['id_forum'];
      
      $user = $_SESSION['id'];
      
      
      
      $cek = mysql_query("SELECT * FROM komentar WHERE id_komentar='$id_komentar' AND id_user=$user");      
      
      if(mysql_num_rows($cek) > '0')
      {
        $query = mysql_query("DELETE FROM komentar WHERE id_komentar=$id_komentar");

        if($query){
          header("Location:admin/forum_show.php?id=$id_forum");
        }else{
          echo mysql_error(); 
        }
      } 
      else
        header("location:admin/forum_show.php?id=$id_forum&message=hapus_gagal");
      
      // if($query)
        // http_build_query($query)
    break;

    case 'lupa_password':
      $email = $_POST['mail'];  
                                        // TCP port to connect to
      $query = mysql_query("SELECT * FROM user WHERE email='$email'");
      if($query){
        if(mysql_num_rows($query) == 0){
          header("Location:lupa_password.php?message=failed");
        }
        else
        {
          $password = rand(111111,999999);
          $lupa = mysql_query("UPDATE user SET password=md5('$password') WHERE email='$email'");
          if($lupa)
          {
            $to=$email;

            $mail = new PHPMailer;
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.slbn-cicendo.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'admin@slbn-cicendo.com';                 // SMTP username
            $mail->Password = 'SkripsiKMS1516';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 26;
            $mail->setFrom('admin@slbn-cicendo.com', 'Admin');
            $mail->addAddress($to, 'Joe User');
            $mail->Subject = 'Password Baru';
            $mail->Body    = "Email : $email <br/> Password : $password";
             
                // Your subject
                // $subject="Reset Password.";

                // // From
                // $header = "From:noerarief03@gmail.com";

                // // Your message
                // $message = "Email : $email <br/> Password : $password";

                // // send email
                // $sentmail = mail($to,$subject,$message,$header);

                // echo $to. " " .$subject. " " .$message. " " .$header;
                if(!$mail->send()) {
                echo 'Pesan tidak bisa dikirim.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Password baru sudah dikirim ke email anda. Silahkan cek.';
            }

                // if($sentmail == FALSE)
                //  echo "Kirim email gagal";
            // header("Location:lupa_password.php?message=success");
          }else
            echo mysql_error();           
        }
      }

      else
        echo mysql_error();     

    break;

    case 'edit_profil':
      $id = $_POST['id'];
	  $nip = $_POST['nip'];
      $nama = $_POST['pengguna'];
      $email = $_POST['emaill'];
	  //$gambar = $_POST['foto'];
	  $fileName = $_FILES['foto']['name']; 
	  $fileSize = $_FILES['foto']['size']; 
	  $fileError = $_FILES['foto']['error']; 
	  $namafilebaru = "../img/profil/".$fileName;
	  if($fileSize > 0 || $fileError == 0){ $move = move_uploaded_file($_FILES['foto']['tmp_name'], $namafilebaru); 
	  if($move){ 
	  echo "Gambar berhalil diupload"; 
	  }else
	  { 
	  echo "Gagal mengupload gambar"; 
	  } 
	  }
	  else{ 
	  echo "Gagal mengupload gambar: ".$fileError; }
  
        $query = mysql_query("UPDATE user SET nip='$nip', nama_user='$nama', email='$email', foto='$fileName' WHERE id_user=$id");        
      
      if($query)
        header("Location:admin/profil.php?id=$id&message=success_edit");
      else
        echo mysql_error();    

    break;

    case 'edit_password':
      $id = $_POST['id'];
      $password_lama = $_POST['password_lama'];
      $password = $_POST['password'];
      $password_lagi = $_POST['password_lagi'];

      $query = mysql_query("SELECT * FROM user WHERE id_user='$id'"); 
      $t = mysql_fetch_array($query);

      $password_lama = md5($password_lama);

      if($password_lama == $t['password']){
        if($password == $password_lagi){
          $query = mysql_query("UPDATE user SET password=md5('$password') WHERE id_user=$id");  
            if($query)
              header("Location:admin/password.php?id=$id&message=success_edit");
            else
              echo mysql_error();     
        }else{
          header("Location:admin/password.php?id=$id&message=pass_tidak_sama");
        }
        
      }
      else
      {
        header("Location:admin/password.php?id=$id&message=pass_lama_salah");
      }
           

    break;

    case 'pencarian':

      header("Location:admin/searching_result.php");
    break;

    default:
      # code...

      break;
  }
  
?>