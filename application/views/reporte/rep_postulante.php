<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/reporte_postulante.js'); ?>" type="text/javascript"></script>
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
            <h3 class="box-title"><u>REPORTE DE POSTULANTES</u></h3>
            <?php echo date('d/m/Y H:i:s'); ?><br>
        </center>
    </div>
</div>
<div class="row no-print" >
    <div class="col-md-3">
        Gestión:
        <select id="gestion_id" name="gestion_id" class="btn btn-primary btn-sm form-control" onchange="mostrar_convocatoria(this.value)" >
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
        Convocatoria:
        <select name="convocatoria_id" class="btn-primary btn-sm btn-block form-control" id="convocatoria_id" onchange="mostrar_beca(this.value)">
            <option value="0" disabled selected >-TODAS-</option>
        </select>
    </div>
    <div class="col-md-3">
        Beca:
        <select name="beca_id" class="btn-primary btn-sm btn-block form-control" id="beca_id">
            <option value="0" disabled selected >-TODAS-</option>
        </select>
    </div>
    <div class="col-md-2">
        Estado:
        <select id="estado_id" name="estado_id" class="btn btn-primary btn-sm form-control" >
            <option value="0">-TODOS-</option>
            <?php
                foreach($all_estado as $estado){ ?>
                    <option value="<?php echo $estado['estado_id']; ?>"><?php echo $estado['estado_descripcion']; ?></option>                                                   
            <?php } ?>
         </select>
    </div>
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-facebook btn-sm form-control" onclick="buscar_postulantes()"><i class="fa fa-search"> Buscar</i></a>
    </div>
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-success btn-sm form-control" onclick="imprimir_postulantes()" title="Imprimir"><i class="fa fa-print"></i> Imprimir</a>
    </div>
</div>
<span id="lagestion"></span>
<span id="laconvocatoria"></span>
<span id="elestado"></span>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Estudiante</th>
                        <th>Carrera</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Beca</th>
                        <th>Obs.</th>
                        <th>Estado</th>
                    </tr>
                    <tbody class="buscar" id="mostrarpostulantes"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
