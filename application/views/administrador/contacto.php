<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Contacto</a></li>
      <li class="active">Información de Contacto</li>
    </ol>
    <section class="content-header">
        <h1>
        Contacto
        <small>Información de Contacto</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                  <form method="post" enctype="multipart/form-data" id="frm_contacto" autocomplete="nope">
                    <div class="modal-body">
                        <div class="form-group col-md-6">
                            <label for="apellidos"><span style="color: red">*</span> Dirección:</label>
                            <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" value="<?php echo $datos->direccion ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos"><span style="color: red">*</span> Correo:</label>
                            <input type="text" class="form-control" id="txt_correo" name="txt_correo" value="<?php echo $datos->correo ?>">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="apellidos"><span style="color: red">*</span> Teléfono:</label>
                            <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" value="<?php echo $datos->telefono ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="apellidos"><span style="color: red">*</span> Descripción Contacto:</label>
                            <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" value="<?php echo $datos->descripcion ?>">
                        </div>

                        <div class="col-md-12">
                          <button type="button" onclick="save()"  style="float: right;" class="btn btn-app btn-form"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url() ?>public/administrador/js/contacto.js"></script>
