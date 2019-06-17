<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrador Web</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/administrador/img/logo_mini.png" sizes="16x16">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/dist/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/alertifyjs/css/themes/default.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/administrador/te/jquery-te-1.4.0.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/comunes/librerias/fullcalendar/fullcalendar.print.min.css" media='print'>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery/jquery.min.js"></script>
    <script>
      //base_url3      = "https://tenisperu.com.pe/";
      //base_url_admin = "https://tenisperu.com.pe/administrador/";
      base_url3      = "http://localhost/cliente_daniel/";
      base_url_admin = "http://localhost/cliente_daniel/administrador/";
    </script>
</head>
<body class="hold-transition skin-red sidebar-mini" onload="javascript:hora_sistema()">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url();?>administrador/dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?php echo base_url() ?>public/administrador/img/logo_mini.png" alt="" style="width: 40px;"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="<?php echo base_url() ?>public/administrador/img/logo_sistema.png" alt="" style="width: 70%;"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
               <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                      <!-- User Account: style can be found in dropdown.less -->
                      <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <?php 
                            if ($this->session->userdata('imagen') == "") {
                              $imagen = base_url()."public/administrador/img/usuario_base.png";
                            } else {
                              $imagen = base_url()."public/administrador/uploads/usuarios/".$this->session->userdata('imagen')."";
                            }
                          ?>
                          <img src="<?php echo $imagen ?>" class="user-image" alt="User Image">
                          <span class="hidden-xs"><?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                          <!-- User image -->
                          <li class="user-header">
                            <img src="<?php echo $imagen ?>" class="img-circle" alt="User Image">

                            <p>
                              <?php echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido') ?>
                              <small><?php echo $this->session->userdata('email') ?> </small>
                            </p>
                          </li>
                          <!-- Menu Footer-->
                          <li class="user-footer">
                            <div class="text-center">
                                <a href="<?php echo base_url() ?>administrador/auth/logout" class="btn btn-default btn-flat"> Cerrar Sesión</a>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>

            </nav>
        </header>