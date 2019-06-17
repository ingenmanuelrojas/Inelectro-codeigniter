<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Inicio</a></li>
      <li class="active">Listado de Usuarios</li>
    </ol>
    <section class="content-header">
        <h1>
        Usuarios
        <small>Listado de Usuarios</small>
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
                          <a href="#" onclick="add_usuarios()" class="btn btn-primary btn-flat"> <span class="fa fa-plus">  Nuevo Usuario</span></a>
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
                                  <th>Nombres</th>
                                  <th>Apellidos</th>
                                  <th>telefono</th>
                                  <th>email</th>
                                  <th>username</th>
                                  <th>Permiso</th>
                                  <th>Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  if (!empty($usuarios)) {
                                      foreach ($usuarios as $usuario) {
                                        if ($usuario->imagen == "") {
                                          $imagen = ''.base_url().'public/administrador/img/usuario_base.png';
                                        } else {
                                          $imagen=''.base_url().'public/administrador/uploads/usuarios/new_'.$usuario->imagen.'';
                                        }
                                      ?>
                                          <tr>
                                              <td><img style="display: block; margin: auto; width: 35px;" src="<?php echo $imagen ?>" alt=""></td>
                                              <td><?php echo $usuario->nombres; ?></td>
                                              <td><?php echo $usuario->apellidos; ?></td>
                                              <td><?php echo $usuario->telefono; ?></td>
                                              <td><?php echo $usuario->email; ?></td>
                                              <td><?php echo $usuario->username; ?></td>
                                              <td><?php echo $usuario->rol; ?></td>
                                              <td style="text-align: center;">
                                                  <?php if ($permisos->update==1): ?>
                                                      <a href="#" data-toggle="modal" data-target="#nuevo_usuario" onclick="buscar_usuario(<?php echo $usuario->id ?>);" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                  <?php endif ?>
                                                  <?php if ($permisos->delete==1): ?>
                                                      <a href="#" onclick="delete_usuario(<?php echo $usuario->id ?>)" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><span class="fa fa-remove"></span></a>
                                                  <?php endif ?>
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
        </div>
    </section>
</div>



<div class="modal fade" id="nuevo_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data" id="form_usuarios" autocomplete="nope">
                <div class="modal-body">
                    <div class="alert alert-warning" id="errores" role="alert" style="display: none;"></div>
                    <div class="form-group col-md-6">
                        <label for="nombres"><span style="color: red">*</span> Nombres:</label>
                        <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" autocomplete="nope"> 
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellidos"><span style="color: red">*</span> Apellidos:</label>
                        <input type="text" class="form-control" name="txt_apellido" id="txt_apellido" autocomplete="ÑÖcompletes">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="teléfono"><span style="color: red">*</span> Teléfono:</label>
                        <input type="text" placeholder="Ej: 123456789" class="form-control" name="txt_telefono" id="txt_telefono" autocomplete="ÑÖcompletes">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><span style="color: red">*</span> Email:</label>
                        <input type="text" class="form-control" name="txt_email" id="txt_email" autocomplete="ÑÖcompletes">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="email"><span style="color: red">*</span> Foto de Perfil:</label>
                        <input type="file" name="txt_file_img" id="txt_file_img" class="form-control">
                        <p class="help-block">Tamaño Recomendado: 80 x 80 (Evite que se distorcione la imágen).</p>
                        
                    </div>
                    <div class="form-group col-md-2 row">
                        <img id="img_perfil" name="img_perfil" src="http://via.placeholder.com/80x80" alt="" style="width: 80px; height: 80px;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="userName"><span style="color: red">*</span> UserName:</label>
                        <input type="text" class="form-control" name="txt_usuario" autocomplete="ÑÖcompletes" id="txt_usuario">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password"><span style="color: red">*</span> Password:</label>
                        <input type="password" class="form-control" name="txt_clave" autocomplete="ÑÖcompletes" id="txt_clave">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="permiso"><span style="color: red">*</span> Permiso:</label>
                        <select name="cmb_rol" id="cmb_rol" class="form-control">
                            <?php foreach ($roles as $rol): ?>
                                <option value="<?php echo $rol->id ?>"><?php echo $rol->descripcion ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <input type="hidden" name="txt_id" id="txt_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="save_usuarios()"  style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                    <!--button type="button" class="btn btn-app btn-form" data-dismiss="modal"><i class="fa fa-save"></i> Close</button-->
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/usuarios.js"></script>
