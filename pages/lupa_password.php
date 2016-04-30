<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SLB Negeri Cicendo Bandung | Lupa Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="..//css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page" style="background: url(../img/2.jpg)no-repeat center center fixed;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; ">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>KMS</b> <br> <img src="../img/a.gif" alt=""></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <H3 class="login-box-msg">Halaman Lupa Password</H3>
        <?php  
        if(isset($_GET['message']))
        {
          if($_GET['message'] == 'success')
          {
            ?>
             <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
              Password baru berhasil dikirim ke email
            </div>
          <?php
          }else if($_GET['message'] == 'failed')  
          {
            ?>
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>              
              Email yang anda masukkan tidak terdaftar
            </div>  
            <?php
          }
        }
        ?>    

        <form action="proses.php?proses=lupa_password" method="post">
      
          <div class="form-group has-feedback">
           <label>
            Masukan Email anda 
           </label>
            <input data-validation="required" data-validation-error-msg="Tulisan Email" type="email" class="form-control" name="mail" placeholder="Email" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
         
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div><!-- /.col -->
              <br><br>
          </div>

        </form>

     
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
