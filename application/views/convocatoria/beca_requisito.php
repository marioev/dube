<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/beca_requisito.js'); ?>" type="text/javascript"></script>

<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="convocatoria_id" id="convocatoria_id" value="<?php echo $convocatoria["convocatoria_id"]; ?>" />

<div class="box-header">
    <font size='4' face='Arial'><b>Convocatoria: </b><?php echo $convocatoria['convocatoria_titulo'] ?></font>
    <br>
    <font size='2' face='Arial'><b>Ver, Modificar Requisitos Asignados a Becas</b></font>
    <!--<br><font size='2' face='Arial'>Registros Encontrados: <?php //echo sizeof($convocatoria); ?></font>-->
    
    <!--<div class="box-tools no-print">
        <a href="<?php //echo site_url('convocatoria/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Convocatoria</a>
    </div>-->
</div>
<div class="row">
    <!--<div class="col-md-4">
        <?php
        /*$convoc = 0;
        if(isset($convocatoria_id)){
            $convoc = $convocatoria_id;
        }
        ?>
        Convocatoria:
        <select id="convocatoria_id" name="convocatoria_id" class="btn btn-primary btn-sm form-control" >
                <?php 
                foreach($all_convocatoria as $convocatoria)
                {
                    $selected = ($convocatoria['convocatoria_id'] == $convoc) ? ' selected="selected"' : "";
                    echo '<option value="'.$convocatoria['convocatoria_id'].'" '.$selected.'>'.$convocatoria['convocatoria_titulo'].'</option>';
                }*/
                ?>
         </select>
    </div>
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-facebook btn-sm form-control" onclick="buscar_becas()"><i class="fa fa-search"> Buscar</i></a>
    </div>-->
    <div class="col-md-12">
        <!--<div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción de la convocatoria..">
        </div>-->
        <div class="box">            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Convocatoria</th>
                        <th>Beca</th>
                        <th>Gestión</th>
                        <th>Plazas</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="mostrarbecas"></tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<a href="<?php echo site_url('convocatoria'); ?>" class="btn btn-danger">
    <i class="fa fa-times"></i> Salir
</a>
            
<!------------------------ INICIO modal para ver requisitos ------------------->
<div class="modal fade" id="modalrequisito" tabindex="-1" role="dialog" aria-labelledby="modalrequisitolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">REQUISITOS</span>
                <div class="col-md-12" style="padding-left: 0px">
                    <div class="input-group">
                        <span class="input-group-addon"> Buscar </span>           
                        <input type="text" id="buscarrequisito" name="buscarrequisito" class="form-control" placeholder="Ingrese el requisito.." autofocus autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class="box-body table-responsive">
                    <table class="table table-striped" id="mitabla">
                        <tr>
                            <th>#</th>
                            <th>Requisito</th>
                        </tr>
                        <tbody class="buscarreq" id="tablaresultados"></tbody>
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
<!------------------------ FIN modal para ver requisitos ------------------->
