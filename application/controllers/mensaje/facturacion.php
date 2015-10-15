<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class facturacion extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function sendemail_fact()
    {   
        $this->load->model('venta/registrar_venta_model','mod');
        $nVenta_id = $this->input->post('nVenta_id');
        $venta = $this->mod->cabecera_venta($nVenta_id);
        $detventa = $this->mod->detalle_venta($nVenta_id);
        $ClienteCorreo = $this->input->post('email_to');         
        $from = "sjacevedo@elventon.net"; 

        $html = '<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style type="text/css">
                .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
                    min-height: 1px;
                    padding-left: 15px;
                    padding-right: 15px;
                    position: relative;
                }
            </style>
        </head>
        <body>            
            <div class="content invoice" id="resumen_venta" style="background: none repeat scroll 0 0 #FFFFFF; margin: 10px auto; position: relative; width: 90%; padding: 20px 15px;">                    
                <!-- title row -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-12" style="width: 100%; float: left;">
                        <h2 class="page-header" style="font-size: 22px; margin: 10px 0 20px; border-bottom: 1px solid #EEEEEE; padding-bottom: 9px;">
                            <i class="fa fa-globe"></i> '.$venta["RazonSocialEmpresa"].'
                            <small class="pull-right" style="float: right !important; color: #666666; display: block; margin-top: 5px;">Fecha: 12/05/2014</small>
                        </h2>                            
                    </div><!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        De
                        <address>
                            <b>RUC:</b> '.$venta['RucEmpresa'].'<br>
                            <strong>'.$venta['RazonSocialEmpresa'].'</strong><br>
                            '.$venta['DireccionEmpresa'].'<br>
                            <i class="fa fa-phone" style="content: "";"></i> '.$venta['TelefonoEmpresa'].'<br>
                            <i class="fa fa-envelope" style="content: "";"></i> '.$venta['EmailEmpresa'].'
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        <b>Cliente:</b>
                        <address>
                            <strong id="clienteR">'.$venta['cliente'].'</strong>
                            <address>
                           '.$venta['direccion_cliente'].'
                            </address>
                        </address>
                        <strong>Ruc:</strong>
                        <address>
                            <strong id="rucR"> '.$venta['documento_cliente'].'</strong><br>
                        </address>
                    </div><!-- /.col -->
                    <div class="col-sm-4 invoice-col" style="width: 33.3333%; float: left;">
                        <b>Tipo Comprobante</b> <br>
                        <address>
                                <strong id="tipdocR">'.$venta['descripcion'].'</strong><br>
                        </address>
                        <b>Serie - Numero</b> <br>
                        <address>
                            '.$venta['serie'].' - '.$venta["numero"].' 
                                <strong id="sercomR"></strong><br>
                        </address>
                        <b>Fec. Emisión:</b>'.date("d/m/Y").'<br>
                        <b>Vendedor:</b>'.$venta['vendedor'].'<br>
                        <b>Tipo Pago:</b>'.$venta['tipopago'].'<br><br>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- TABLA DE PRODUCTOS POR COMPRAR aqui -->
                <!-- Table row -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-12 table-responsive" style="width: 100%; float: left;">
                        <table class="table table-striped" id="tabla_resumen_productos" style="background-color: rgba(0, 0, 0, 0); max-width: 100%; border-collapse: collapse; border-spacing: 0; margin-bottom: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Producto</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Cantidad</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Precio</th>
                                    <th style="border-bottom: 2px solid #DDDDDD; vertical-align: bottom; text-align: left; border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">Importe</th>
                                </tr>
                            </thead>
                            <tbody>';
                            foreach ($detventa as $value) {
                                $html .='<tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$value['nombre'].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$value["cantidad"].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$value["preciounitario"].'</td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$value["importe"].'</td>
                                </tr> ';
                             }                                
                                $html .='</tbody>
                      
                            
                        </table>
                    </div>
                </div>
                <br>
                <!-- END TABLA DE PRODUCTOS -->
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
                    <div class="col-xs-6 col-lg-6" style="width: 50%; float: left; box-sizing: border-box;"></div>
                    <div class="col-xs-6 col-lg-6" style="width: 50%; float: right; box-sizing: border-box;">
                        <table class="table" style="background-color: rgba(0, 0, 0, 0); max-width: 100%; border-collapse: collapse; border-spacing: 0; margin-bottom: 0; width: 100%;">
                            <tbody>
                                <tr>
                                <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    <strong>Subtotal</strong>
                                </td>
                                <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                    '.$venta["subTotal"].'</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        <strong>IGV</strong>
                                    </td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$venta["impuestoporcentaje"].'%</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        <strong>Total</strong>
                                    </td>
                                    <td style="border-top: 1px solid #DDDDDD; line-height: 1.42857; padding: 8px; vertical-align: top;">
                                        '.$venta["montoTotal"].'</td>
                                </tr>
                        </tbody></table>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        $para           =  $ClienteCorreo;
        $subject        =  "Facturación de su venta";
        $msg            =   $html;                            
        $mainheaders    =  'Content-type: text/html; charset=utf-8' . "\r\n";
        $mainheaders    .=  'From: Facturación <'.$from.'>' . "\r\n";
      
        $resultado = mail ($para, $subject, $msg, $mainheaders, "-f ".$from);

        if($resultado){
           //echo 'Enviado! :)'.$html;
           $return = array("responseCode"=>200, "datos"=>"ok");
        }        
        else
           $return = array("responseCode"=>400, "greeting"=>"Bad");

        $return = json_encode($return);
        echo $return;

    }
}
?>