        <footer class="main-footer">
            <button class="btn btn-flat btn-footer"><b>Usuario:</b> <?php echo $this->session->userdata("nombre") ?></button>
            <button class="btn btn-flat btn-footer"><b>Fecha: </b><?php echo date('d/m/Y'); ?></button>
            <button class="btn btn-flat btn-footer" id="btn-hora"></button>
            <button class="btn btn-flat btn-footer"  style="float: right;">Version 1.0</button>
        </footer>
    </div>
    <!-- ./wrapper -->


	<!-- <script src="<?php echo base_url();?>public/comunes/librerias/jquery/jquery.min.js"></script> -->
	<script src="<?php echo base_url();?>public/comunes/librerias/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/select2/dist/js/select2.full.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/select2/dist/js/i18n/es.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/fastclick/lib/fastclick.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/dist/js/adminlte.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/dist/js/demo.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/alertifyjs/alertify.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/chart.js/Chart.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/dist/js/graficas_admin.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/dist/js/validaciones.js"></script>
	<script src="<?php echo base_url() ?>public/administrador/te/jquery-te-1.4.0.min.js"></script>
	
	<?php if ($this->uri->segment(2) == "productos"): ?>
		<script src="<?php echo base_url();?>public/comunes/librerias/ckeditor/ckeditor.js"></script>
	<?php endif ?>


	    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>public/comunes/librerias/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="<?php echo base_url();?>public/comunes/librerias/dist/js/custom.js"></script>
	
	<script>
		$(document).ready(function() {
			<?php if ($this->uri->segment(2) == "productos") { ?>
				CKEDITOR.replace('txt_caracteristicas');
			<?php } ?>
		});
	</script>

	
</body>
</html>
