<?php

    if ($this->uri->segment(1) == "" || $this->uri->segment(1) == "home") {
        $titulo = "Inicio";
    }else if($this->uri->segment(1) == "nosotros"){
        $titulo = "Nosotros";
    }else if($this->uri->segment(1) == "productos"){
        $titulo = "Productos";
    }else if($this->uri->segment(1) == "contacto"){
        $titulo = "Contacto";
    }else{
        $titulo = "";
    }
?>
<!doctype html>
<html class="no-js" lang="en">
    
<!-- Mirrored from ourstore.infinitelayout.com/ourstore/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Jun 2019 18:50:12 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>In Electro | <?php echo $titulo ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>public/administrador/img/logo_mini.png" sizes="16x16">

        <!-- Fonts -->
        <link href="<?php echo base_url() ?>public/frontend/css/csse78d.css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/frontend/css/css1315.css?family=Raleway:300,400,500,600,700,800i" rel="stylesheet">

        <!-- favicon icon -->
        <link rel="shortcut icon" type="images/png" href="images/favicon.ico">

        <!-- all css here -->
        <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/style_core.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <!-- modernizr css -->
        <script src="<?php echo base_url() ?>public/frontend/js/vendor/modernizr-2.8.3.min.js"></script>
        <script>
            base_url = "http://localhost/cliente_daniel/";
        </script>
    </head>
    <body>
        <div class="preloader">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object object_one"></div>
                    <div class="object object_two"></div>
                    <div class="object object_three"></div>
                </div>
            </div>
        </div>
        <div class="page-1">
            <!--Start-Header-area-->