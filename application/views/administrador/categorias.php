<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Categorías</a></li>
      <li class="active">Listado de Categorías</li>
    </ol>
    <section class="content-header">
        <h1>
        Categorías
        <small>Listado de Categorías</small>
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
                          <a href="#" onclick="nueva_categoria()" class="btn btn-primary btn-flat">Nueva Categoría</a>
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
                                  <th>Fecha/Hora</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (!empty($listado)) { $cont = 1;
                                      foreach ($listado as $categoria) { ?>
                                          <tr>
                                              <td><?php echo $cont ?></td>
                                              <td><?php echo $categoria->nombre; ?></td>
                                              <td><?php echo $categoria->descripcion; ?></td>
                                              <td><?php echo $categoria->fecha_hora; ?></td>
                                              <td style="text-align: center;">
                                                  <?php if ($permisos->update==1): ?>
                                                      <a href="#" data-toggle="modal"  data-target="#modal_categorias" onclick="buscar_categoria(<?php echo $categoria->id ?>);" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                  <?php endif ?>
                                                  <?php if ($permisos->delete==1): ?>
                                                      <a href="#" onclick="delete_categoria(<?php echo $categoria->id ?>)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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



<div class="modal fade" id="modal_categorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Categoria</h4>
            </div>
            <form method="post" enctype="multipart/form-data" id="frm_categorias" autocomplete="nope">
                <div class="modal-body">
                    <div class="alert alert-warning" id="errores" role="alert" style="display: none;"></div>
                    <div class="form-group col-md-12">
                        <label for="nombres"><span style="color: red">*</span> Nombre:</label>
                        <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" autocomplete="nope"> 
                    </div>
                    <div class="form-group col-md-12">
                        <label for="apellidos"><span style="color: red">*</span> Descripción:</label>
                        <textarea name="txt_descripcion" id="txt_descripcion" class="form-control" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="txt_id" id="txt_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="save_categoria()"  style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                    <!--button type="button" class="btn btn-app btn-form" data-dismiss="modal"><i class="fa fa-save"></i> Close</button-->
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/categorias.js"></script>
