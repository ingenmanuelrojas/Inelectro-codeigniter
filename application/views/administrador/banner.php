<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Banners</a></li>
      <li class="active">Listado de Banners</li>
    </ol>
    <section class="content-header">
        <h1>
        Banners
        <small>Listado de Banners</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="col-md-12 table-responsive">
                    <div id="id_tabla"> 
                      <table class="table table-bordered table-hover table-condensed data_table">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Modulo</th>
                                  <th>Sección</th>
                                  <th>Link</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (!empty($listado)) { $cont = 1;
                                      foreach ($listado as $banner) { ?>
                                          <tr>
                                              <td><?php echo $cont ?></td>
                                              <td><?php echo $banner->modulo; ?></td>
                                              <td><?php echo $banner->lugar; ?></td>
                                              <td><?php echo $banner->link; ?></td>
                                              <td style="text-align: center;">
                                                  <?php if ($permisos->update==1): ?>
                                                      <a href="#" data-toggle="modal"  data-target="#modal_banner" onclick="buscar_banner(<?php echo $banner->id ?>)" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                                                  <?php endif ?>
                                              </td>
                                          </tr>
                                      <?php 
                                    $cont++;  }
                                  }
                              ?>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="modal fade" id="modal_banner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
            </div>
            <form method="post" enctype="multipart/form-data" id="frm_banner" autocomplete="nope">
                <div class="modal-body">
                  <div class="col-md-12" id="capa_loading" style="display: none;">
                    <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nombres">Módulo:</label>
                    <input type="text" class="form-control" name="txt_modulo" id="txt_modulo" readonly="true">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nombres">Lugar/Sección:</label>
                    <input type="text" class="form-control" name="txt_lugar" id="txt_lugar" readonly="true">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nombres">Link/Url:</label>
                    <input type="text" class="form-control" name="txt_link" id="txt_link">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="nombres">Nueva Imágen: <span id="txt_medidas" style="color: red;"></span></label>
                    <input type="file" class="form-control" name="txt_file" id="txt_file" accept="image/png,image/jpeg,image/jpg">
                  </div>
                  <div class="col-md-12">
                    <div class="panel panel-info">
                      <div class="panel-heading">Imágen Actual</div>
                      <div class="panel-body" >
                        <div class="col-md-12" id="capa_img"></div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="save_banner()" style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                </div>
                <input type="hidden" id="txt_id" name="txt_id">
                <input type="hidden" id="txt_width" name="txt_width">
                <input type="hidden" id="txt_height" name="txt_height">
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/banner.js"></script>
