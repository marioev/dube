<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!--<script src="<?php //echo base_url('resources/js/reporte_postulante.js'); ?>" type="text/javascript"></script>-->
<script type="text/javascript">
    $(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });
    function imprimir(){
        window.print();
    }
</script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="cuerpo">
    <div class="columna_derecha">
        <center> 
            <img src="<?php echo base_url('resources/images/logo/logoumss.png'); ?>"  style="width:60%;height:60px">
        </center>
    </div>
    <!--<div class="columna_izquierda">
       <center>  <font size="4"><b><u><?php /*echo $empresa[0]['empresa_nombre']; ?></u></b></font><br>
            <?php echo $empresa[0]['empresa_zona']; ?><br>
            <?php echo $empresa[0]['empresa_direccion']; ?><br>
            <?php echo $empresa[0]['empresa_telefono'];*/ ?>
         </center>
    </div>-->
    <div class="columna_central">
        <center>
            <h3 class="box-title"><u>POSTULANTE</u></h3>
            <h3 class="box-title"><u><?php echo $postulante["estudiante_apellidos"]." ".$postulante["estudiante_nombre"] ?></u></h3>
            <?php echo date('d/m/Y H:i:s'); ?><br>
        </center>
    </div>
</div>
<div>
    <table>
        <tr>
            <td class="text-bold text-right">Gestión:&nbsp;&nbsp;&nbsp;</td>
            <td><?php echo $postulante["gestion_descripcion"]?></td>
        </tr>
        <tr>
            <td class="text-bold text-right">Convocatoria:&nbsp;&nbsp;&nbsp;</td>
            <td><?php echo $postulante["convocatoria_titulo"]?></td>
        </tr>
        <tr>
            <td class="text-bold text-right">Tipo de Beca:&nbsp;&nbsp;&nbsp;</td>
            <td><?php echo $postulante["beca_nombre"]?></td>
        </tr>
        <tr>
            <td class="text-bold text-right">Estado:&nbsp;&nbsp;&nbsp;</td>
            <td><?php echo $postulante["estado_descripcion"]?></td>
        </tr>
    </table>
    <div class="text-center no-print">
        <a class="btn btn-success" onclick="imprimir()">
            <i class="fa fa-print"></i> Imprimir</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Requisito</th>
                        <th>Observación</th>
                        <th>Estado</th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($requisitos as $requisito){ ?>
                    <tr style="background: <?php echo $requisito["estado_color"]; ?>">
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $requisito['requisito_nombre']; ?></td>
                        <td><?php echo $requisito['formulario_observacion']; ?></td>
                        <td><?php echo $requisito['estado_descripcion']; ?></td>
                    </tr>
                    <?php
                    $i++;
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center no-print">
            <a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i> Regresar</a>
            </div>
        </div>
    </div>
</div>
