<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrador Web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/administrador/img/logo_mini.png" sizes="16x16">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/dist/css/AdminLTE.css">

</head>
<body class="hold-transition login-page" style="display: flex;justify-content: center;align-items: center; left: 50px; ">
    <div class="login-box">
      
        <div class="login-box-body" style="background-color: #ffffff;" >
            <img src="<?php echo base_url() ?>public/administrador/img/logo-nuevo.png" alt="" style="width: 320px;display: block;margin: auto;">
            <hr>
            <p class="login-box-msg" style="color: #000; font-size: 18px;"><b>Introduzca sus datos:</b></p>
            <?php if ($this->session->flashdata("error")) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error :</strong> <?php echo $this->session->flashdata("error"); ?>
              </div>
            <?php } ?>
            <form action="<?php echo base_url(); ?>administrador/auth/login" method="post" autocomplete="off">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" name="txt_username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="txt_password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>public/comunes/librerias/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>public/comunes/librerias/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
