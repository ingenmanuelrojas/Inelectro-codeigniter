<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Slider</a></li>
      <li class="active">Galería de Imágenes del Slider</li>
    </ol>
    <section class="content-header">
        <h1>
        Sliders
        <small>Galería de Imágenes del Slider</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                  <form method="post" enctype="multipart/form-data" id="frm_slider" autocomplete="nope">
                      <div class="col-md-12" style="display: none;" id="capa_loading">
                        <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                        <br>
                      </div>
                      <div class="form-group col-md-9">
                          <label for="nombres">Imágen: <span style="color: #DAA520">Tamaño 1920xp por 800px, evite que se distorcione la imágen</span></label>
                          <input type="file" class="form-control" name="txt_file_img" id="txt_file_img" autocomplete="nope" accept="image/png,image/jpeg,image/jpg">
                      </div>

                      <div class="form-group col-md-3">
                          <label for="nombres">Orden:</label>
                          <input type="number" class="form-control" id="txt_orden" name="txt_orden" value="1" min="0">
                      </div>
                      
  
                      <div class="col-md-3">
                        <label for="nombres">Texto 1:</label>
                        <input type="text" class="form-control" id="txt_texto_1" name="txt_texto_1">
                      </div>
                      <div class="col-md-3">
                        <label for="nombres">Texto 2:</label>
                        <input type="text" class="form-control" id="txt_texto_2" name="txt_texto_2">
                      </div>
                      <div class="col-md-6">
                        <label for="nombres">Descripción:</label>
                        <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion">
                      </div>

                      <div class="col-md-12">
                        <br>
                        <center>
                          <button type="button" onclick="save_slider()" class="btn btn-success">Crear Slider</button>
                          <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" class="loading" alt="" style="width: 60px; display: block; margin:auto; display: none;">
                        </center>
                        <br>
                      </div>


                      <div class="col-md-12">
                        <div class="panel panel-info">
                          <div class="panel-heading">Listado de Imágenes guardadas</div>
                          <div class="panel-body" > 
                            <div class="col-md-12" style="display: none;" id="capa_loading2">
                              <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                              <br>
                            </div>
                            <div class="row" id="capa_sliders">
                                <?php foreach ($listado as $slider): ?>
                                  <div class="col-md-6">
                                    <a href="#" class="thumbnail">
                                      <img src="<?php echo base_url(); ?>public/administrador/uploads/sliders/new_<?php echo $slider->image ?>" alt="...">
                                      <br>
                                      <center>
                                        <h5><?php echo $slider->orden ?></h5>
                                        <p><?php echo $slider->texto_1 ?> - <?php echo $slider->texto_2 ?></p>
                                        <p><?php echo $slider->descripcion ?></p>
                                        <button type="button" class="btn btn-danger" onclick="eliminar_imagen(<?php echo $slider->id ?>)">Eliminar</button>
                                      </center>
                                    </a>
                                  </div> 
                                <?php endforeach ?>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/slider.js"></script>
