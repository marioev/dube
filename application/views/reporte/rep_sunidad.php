<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reporte_sunidad.js'); ?>" type="text/javascript"></script>
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
</script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="cuerpo">
    <div class="columna_derecha">
        <center> 
            <img src="<?php echo base_url('resources/images/logo/logoumss.png'); ?>"  style="width:12%; height:70px">
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
            <h3 class="box-title"><u>REPORTE DE SOLICITUD DE UNIDADES</u></h3>
            <?php echo date('d/m/Y H:i:s'); ?><br>
            <!--<b>VENTAS REALIZADAS</b>-->
        </center>
    </div>
</div>
<div class="row no-print" >
    <div class="col-md-3">
        Gestión:
        <select id="gestion_id" name="gestion_id" class="btn btn-primary btn-sm form-control" >
            <option value="0">-TODOS-</option>
            <?php
                foreach($all_gestion as $gestion){
                    $selected = ($gestion['estado_id'] == 9) ? ' selected="selected"' : "";
            ?>
                    <option value="<?php echo $gestion['gestion_id']; ?>" <?php echo $selected; ?>><?php echo $gestion['gestion_descripcion']; ?></option>                                                   
            <?php } ?>
         </select>
    </div>
    <div class="col-md-3">
        Unidad:
        <select id="unidad_id" name="unidad_id" class="btn btn-primary btn-sm form-control" >
            <option value="0">-TODOS-</option>
            <?php
                foreach($all_unidad as $unidad){ ?>
                    <option value="<?php echo $unidad['unidad_id']; ?>"><?php echo $unidad['unidad_nombre']; ?></option>                                                   
            <?php } ?>
         </select>
    </div>
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-facebook btn-sm form-control" onclick="buscar_reporte()"><i class="fa fa-search"> Buscar</i></a>
    </div>
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-success btn-sm form-control" onclick="imprimir_reporte()"><i class="fa fa-print"> Imprimir</i></a>
    </div>
</div>
<span id="lagestion"></span>
<span id="launidad"></span>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Unidad Solicitante</th>
                        <th>Unidad</th>
                        <th>Requerimiento</th>
                        <th>Actividad</th>
                        <th>Cantidad Becarios</th>
                        <th>Becarios Aceptados</th>
                        <th>Disponibilidad de Becas</th>
                        <th>Resp. Unidad</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="mostrarsolicitudes"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!------------------------ INICIO modal para ver Becarios ------------------->
<div class="modal fade" id="modalverbecarios" tabindex="-1" role="dialog" aria-labelledby="modalverbecarioslabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold" id="eltitulo">Becarios</span>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class="box-body table-responsive">
                    <table class="table table-striped" id="mitabla">
                        <tbody id="losbecarios"></tbody>
                    </table>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para ver Becarios ------------------->