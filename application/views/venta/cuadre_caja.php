<?php $ruta = base_url(); ?>
<?php
	
	$fecha = date("d-m-Y");

	ob_start();
?>
<style type="text/css">
<!--
	table{	
		width: 100%;
		border-collapse: collapse; 
		text-align: center; 
		border: 1px solid #000;
	}
	table tr{
		border: 1px solid #000;
	}
	th{
		background: #e7e6e6;
	}
	#header{
		width: 100%;
	}
	#resume, #total{
		border: #111 1px solid;
		padding: 10px;
	}
	#resume td.impar, .upbold{
		font-weight: bold; 
		text-transform: uppercase;
	}
-->
</style>
	<page backtop="1mm" backbottom="9mm" backleft="1mm" backright="1mm">
		<page_footer>
			<div>
				<hr>
				<span> Página [[page_cu]]/[[page_nb]]</span>
			</div>
	    </page_footer>
		<div style="border: 2px solid #000;padding:5px; height: 98%; width: 98.5%;">
				<table style="width: 100%;">
					<tr>
						<td style="width:20%;" rowspan="3"></td>
					</tr>
					<tr>
						<td style="height: 20px;" rowspan="2"></td>
						<td></td>
					</tr>
					<tr>
						<td rowspan="2"></td>
						<td style="background:#111; height: 40px; font-size:1em; color: #fff; padding-right: 15px; text-align: right; text-transform: uppercase; width: 63%;">
							<h3>CUADRE DE CAJA</h3>					
						</td>
					</tr>
					<tr>
						<td style="height: 20px; text-align:left; width: 25%;"><span>Fecha:&nbsp;&nbsp;</span><?php echo $fecha;?></td>
					</tr>
				</table>
			<div style="border-bottom: 1px solid #000; width: 100%;padding-bottom:5px;">
				<br>
				<p><strong>REFERENCIA</strong></p>
				<table>
					<tr>
						<td style="width:70%;">VENTAS POR CONTADO</td>
						<td style="width:30%;"><?php echo $sumRefContado ?></td>
					</tr>
					<tr style="border: 1px solid #000;">
						<td>VENTAS POR CRÉDITO</td>
						<td style="border-bottom: 1px solid #000;"><?php echo $sumRefCredito ?></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<?php echo $sumRefContado+$sumRefCredito; ?>
						</td>
					</tr>
				</table>
			</div>
			<div style="border-bottom: 1px solid #000; width: 100%;padding-bottom:5px;">
			<p><strong>INGRESO</strong></p>
			<table>
				<tr>
					<td style="width:70%;">VENTAS POR CONTADO</td>
					<td style="width:30%;"><?php echo $sumRefContado ?></td>
				</tr>
				<tr >
					<td>COBRO POR CUOTAS</td>
					<td><?php echo $sumCobroCuota ?></td>
				</tr>
				<tr>
					<td>DEPÓSITO</td>
					<td style="border-bottom: 1px solid #000;"><?php echo $sumMontoD ?></td>
				</tr>
				<tr>
					<td style="width:70%;"></td>
					<td style="width:30%;"><?php echo $totalIngreso;  ?></td>
				</tr>
			</table>
			</div>
			<div style="border-bottom: 1px solid #000; width: 100%;padding-bottom:5px;">
			<p><strong>SALIDA</strong></p>
			<table>
				<tr>
					<td style="width:70%;">RETIRO</td>
					<td style="width:30%;"><?php echo $sumMontoR ?></td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td style="width:70%; text-align: right;"><strong>TOTAL DE CAJA</strong></td>
					<td style="width:30%; padding-left: 17px; font-weight: bold; text-align: center;" ><strong><?php echo $totalIngreso - $sumMontoR; ?></strong></td>
				</tr>
			</table>
			</div>
		</div>
	</page>
    <?php 
  	$content = ob_get_clean();

    require_once(dirname($_SERVER['SCRIPT_FILENAME']).'/assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('reporte_actividades_'.date("d-m-Y").'.pdf');

?>