		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">
			<div class="hide-fixed pull-right pad-rgt">Versión 1.0</div>
			<p class="pad-lft">&#0169;2015 TECHCREATIVE</p><!-- DevCloud Project -->
		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->

		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->

	<!--JAVASCRIPT-->
	<!--=================================================-->
	<script src="<?php echo base_url();?>assets/js/jquery-2.1.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/fast-click/fastclick.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/nifty.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/morris-js/morris.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/morris-js/raphael-js/raphael.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/skycons/skycons.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>

	<script src="<?php echo base_url();?>assets/plugins/chosen/chosen.jquery.min.js"></script>
	
	<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/js/util/dataTables.tableTools.js"></script>	
    <!--
    <script src="<?php echo base_url();?>assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>-->
    <!--<script src="<?php echo base_url();?>assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>-->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url();?>assets/js/util/jquery.blockUI.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootbox/bootbox.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/util/datatables.actions.js"></script>
    <script src="<?php echo base_url();?>assets/js/util/datatable_plugins.js"></script>
    <script src="<?php echo base_url();?>assets/js/util/functiongen.js"></script>
    <script src="<?php echo base_url();?>assets/js/util/printThis.js"></script>
    <script src="<?php echo base_url();?>assets/js/util/ajaxfileupload.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris-js/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris-js/raphael-js/raphael.min.js"></script>
   
    <!--<script src="<?php echo base_url();?>assets/js/typeahead/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url();?>assets/js/typeahead/dist/typeahead.jquery.js"></script>
    -->
    

	<script src="<?php echo $jsvista;?>"></script>    
    <script type="text/javascript">
        var base_url = "<?php echo base_url();?>";
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#<?=$dropactive ?>').addClass('active');
            $('#<?=$active ?>').addClass('active');
            $('#<?=$subactive ?>').addClass('active');
        });
    </script>
    <script type="text/javascript">

            /*var usuario = getAjaxObject(base_url+"accesos/servicios/get_user/persona");
            $('#nombre_usuario_menu').text(usuario);*/
            
   	</script>

</body>
</html>