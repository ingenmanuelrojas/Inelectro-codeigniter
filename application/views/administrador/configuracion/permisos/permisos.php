<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Inicio</a></li>
      <li class="active">Listado de Permisos</li>
    </ol>
    <section class="content-header">
        <h1>
        Permisos
        <small>Listado de Permisos</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-primary btn-flat" onclick="add_permisos()">  <span class="fa fa-plus">  Nuevo Permiso</span></a>
                    </div>
                </div>
                <hr>
                <div class="col-md-12 table-responsive">
                    <div id="id_tabla">
                        <table class="table table-bordered table-hover table-condensed data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Menu</th>
                                    <th class="text-center">Leer</th>
                                    <th class="text-center">Insertar</th>
                                    <th class="text-center">Actualizar</th>
                                    <th class="text-center">Eliminar</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (!empty($permisos)) {
                                        foreach ($permisos as $permiso) { ?>
                                            <tr>
                                                <td class="text-center"><?php echo $permiso->id; ?></td>
                                                <td><?php echo $permiso->rol; ?></td>
                                                <td><?php echo $permiso->menu; ?></td>
                                                <td class="text-center">
                                                    <?php if ($permiso->read==0): ?>
                                                        <span class="fa fa-times"></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-check"></span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permiso->insert==0): ?>
                                                        <span class="fa fa-times"></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-check"></span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permiso->update==0): ?>
                                                        <span class="fa fa-times"></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-check"></span>
                                                    <?php endif ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($permiso->delete==0): ?>
                                                        <span class="fa fa-times"></span>
                                                    <?php else: ?>
                                                        <span class="fa fa-check"></span>
                                                    <?php endif ?>
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href="#" data-toggle="modal" data-target="#modal_permisos" onclick="buscar_permiso(<?php echo $permiso->id ?>);" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="#" onclick="delete_permiso(<?php echo $permiso->id ?>)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>  
                                                </td>
                                            </tr>
                                        <?php 
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal_permisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Permiso</h4>
            </div>
            <form method="post" autocomplete="off" id="frm_permisos" autocomplete="nope">
                <div class="modal-body">
                    <div class="form-group col-md-6">
                        <label for="descripcion">Rol:</label>
                        <select name="cmb_rol" id="cmb_rol" class="form-control">
                            <?php foreach ($roles as $rol): ?>
                                <option value="<?php echo $rol->id ?>"><?php echo $rol->descripcion ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="descripcion">Menu:</label>
                        <select name="cmb_menu" id="cmb_menu" class="form-control">
                            <?php foreach ($menus as $menu): ?>
                                <option value="<?php echo $menu->id ?>"><?php echo $menu->nombre ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    
                    <div class="col-md-12">
                        <hr>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="descripcion">Leer:</label>
                        <div class="form-group">
                            <label>
                                Si <input type="radio" name="rd_leer" id="rd_leer" value="1" class="minimal" checked>
                            </label>
                            <label>
                                No <input type="radio" name="rd_leer" id="rd_leer" value="0" class="minimal">
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descripcion">Agregar:</label>
                        <div class="form-group">
                            <label>
                                Si <input type="radio" name="rd_agregar" id="rd_agregar" value="1" class="minimal" checked>
                            </label>
                            <label>
                                No <input type="radio" name="rd_agregar" id="rd_agregar" value="0" class="minimal">
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descripcion">Editar:</label>
                        <div class="form-group">
                            <label>
                                Si <input type="radio" name="rd_editar" id="rd_editar" value="1" class="minimal" checked>
                            </label>
                            <label>
                                No <input type="radio" name="rd_editar" id="rd_editar" value="0" class="minimal">
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="descripcion">Eliminar:</label>
                        <div class="form-group">
                            <label>
                                Si <input type="radio" name="rd_eliminar" id="rd_eliminar" value="1" class="minimal" checked>
                            </label>
                            <label>
                                No <input type="radio" name="rd_eliminar" id="rd_eliminar" value="0" class="minimal">
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="txt_id" id="txt_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="save_permisos()"  style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url() ?>public/administrador/js/permisos.js"></script>
