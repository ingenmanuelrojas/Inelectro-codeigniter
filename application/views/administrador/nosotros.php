<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ol class="breadcrumb breadcum">
      <li><a href="<?php echo base_url() ?>">Nosotros</a></li>
      <li class="active">Información de la Empresa</li>
    </ol>
    <section class="content-header">
        <h1>
        Nosotros
        <small>Información de la Empresa</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                  <form method="post" enctype="multipart/form-data" id="frm_nosotros" autocomplete="nope">
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <label for="apellidos"><span style="color: red">*</span> ¿Quienes Somos?:</label>
                            <textarea name="txt_quienes_somos" id="txt_quienes_somos" class="form-control" rows="4">
                              <?php echo $datos->quienes_somos ?>
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos"><span style="color: red">*</span> Misión:</label>
                            <textarea name="txt_mision" id="txt_mision" class="form-control" rows="4">
                              <?php echo $datos->mision ?>
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos"><span style="color: red">*</span> Visión:</label>
                            <textarea name="txt_vision" id="txt_vision" class="form-control" rows="4">
                               <?php echo $datos->vision ?>
                            </textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="apellidos"><span style="color: red">*</span> ¿Porqué Elegirnos?:</label>
                            <textarea name="txt_porque_elegirnos" id="txt_porque_elegirnos" class="form-control" rows="3">
                               <?php echo $datos->porque_elegirnos ?>
                            </textarea>
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

<script src="<?php echo base_url() ?>public/administrador/js/nosotros.js"></script>
