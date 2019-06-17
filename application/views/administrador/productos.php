<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Productos</a></li>
      <li class="active">Listado de Productos</li>
    </ol>
    <section class="content-header">
        <h1>
        Productos
        <small>Listado de Productos</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($permisos->insert==1): ?>
                          <a href="#" onclick="nuevo_producto()" class="btn btn-primary btn-flat">Nueva Producto</a>
                            <hr>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-md-12 table-responsive">
                    <div id="id_tabla"> 
                      <table class="table table-bordered table-hover table-condensed data_table">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nombre</th>
                                  <th>Descripcion</th>
                                  <th>Categoría</th>
                                  <th>Estatus</th>
                                  <th>Fecha/Hora</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (!empty($listado)) { $cont = 1;
                                      foreach ($listado as $producto) { ?>
                                          <tr>
                                              <td><?php echo $cont ?></td>
                                              <td><?php echo $producto->nombre; ?></td>
                                              <td><?php echo $producto->descripcion_corta; ?></td>
                                              <td><?php echo $producto->categoria; ?></td>
                                              <td><?php echo $producto->estatus; ?></td>
                                              <td><?php echo $producto->fecha_hora; ?></td>
                                              <td style="text-align: center;">
                                                  <?php if ($permisos->update==1): ?>
                                                      <a href="#" data-toggle="modal"  data-target="#modal_productos" onclick="buscar_producto(<?php echo $producto->id ?>);" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                      <a href="#" onclick="buscar_galeria(<?php echo $producto->id ?>);" data-toggle="tooltip" data-placement="top" title="Galeria" class="btn btn-info"><span class="fa fa-image"></span></a>
                                                  <?php endif ?>
                                                  <?php if ($permisos->delete==1): ?>
                                                      <a href="#" onclick="delete_producto(<?php echo $producto->id ?>)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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



<div class="modal fade" id="modal_productos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
            </div>
            <form method="post" enctype="multipart/form-data" id="frm_productos" autocomplete="nope">
                <div class="modal-body">
                    <div class="alert alert-warning" id="errores" role="alert" style="display: none;"></div>
                    <div class="form-group col-md-4">
                        <label for="nombres"><span style="color: red">*</span> Nombre:</label>
                        <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" autocomplete="nope"> 
                    </div>
                    <div class="form-group col-md-4">
                        <label for="categorias"><span style="color: red">*</span> Categoría:</label>
                        <select name="cmb_categoria" id="cmb_categoria" class="form-control">
                           <option value="">Seleccione...</option>
                           <?php foreach ($categorias as $categoria): ?>
                              <option value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre ?></option>
                           <?php endforeach ?>
                         </select> 
                    </div>

                    <div class="form-group col-md-4">
                        <label for="categorias"><span style="color: red">*</span> Estatus:</label>
                        <select name="cmb_estatus" id="cmb_estatus" class="form-control">
                           <option value="">Seleccione...</option>
                           <option value="Nuevo">Nuevo</option>
                           <option value="Mas Vendidos">Más Vendidos</option>
                         </select> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="nombres"><span style="color: red">*</span> Descripción Corta:</label>
                        <input type="text" class="form-control" name="txt_desc_corta" id="txt_desc_corta" autocomplete="nope"> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="apellidos"><span style="color: red">*</span> Descripción Larga:</label>
                        <textarea name="txt_desc_larga" id="txt_desc_larga" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="apellidos"><span style="color: red">*</span> Características Generales:</label>
                        <textarea name="txt_caracteristicas" id="txt_caracteristicas" class="form-control" ></textarea>
                    </div>
                    <input type="hidden" name="txt_id" id="txt_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="save_producto()"  style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                    <!--button type="button" class="btn btn-app btn-form" data-dismiss="modal"><i class="fa fa-save"></i> Close</button-->
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="modal_galeria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel1">Galeria de Imágenes</h4>
            </div>
              <form method="post" enctype="multipart/form-data" id="frm_galeria" autocomplete="nope">
                  <div class="modal-body">
                      <div class="col-md-12" style="display: none;" id="capa_loading">
                        <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                        <br>
                      </div>
                      <div class="form-group col-md-1">
                          <label for="nombres">Imágen:</label>
                      </div>
                      <div class="form-group col-md-6">
                          <input type="file" class="form-control" name="txt_file" id="txt_file" autocomplete="nope" accept="image/png,image/jpeg,image/jpg">
                          <p class="text-warning">Tamaño 800px por 800px, evite que se distorcione la imágen.</p>
                          <input type="hidden" name="txt_id_prod" id="txt_id_prod"> 
                      </div>
                      <div class="form-group col-md-1">
                          <label for="nombres">Orden:</label>
                      </div>
                      <div class="form-group col-md-2">
                          <input type="number" class="form-control" id="txt_orden" name="txt_orden" value="1" min="0">
                      </div>
                      <div class="col-md-2">
                        <button type="button" onclick="adjuntar_imagen()" class="btn btn-success">Adjuntar</button>
                      </div>
                      <div class="col-md-12">
                        <div class="panel panel-info">
                          <div class="panel-heading">Listado de Imágenes guardadas</div>
                          <div class="panel-body" >
                            <div class="col-md-12" style="display: none;" id="capa_loading2">
                              <img src="<?php echo base_url() ?>public/administrador/img/loading.gif" alt="" style="width: 60px; display: block; margin:auto;">
                              <br>
                            </div>
                            <div class="row" id="capa_galeria" >
                              
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                  </div>
              </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/productos.js"></script>
