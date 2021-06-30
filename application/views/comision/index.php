<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/comision_index.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="lacomisionadmin_id" id="lacomisionadmin_id" />
<div class="box-header">
    <font size='4' face='Arial'><b>Comisión</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <span id="numcomisiones"></span></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('comision/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Comisión</a>
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
    <div class="col-md-2">
        &nbsp;
        <a class="btn btn-facebook btn-sm form-control" onclick="buscar_comision()"><i class="fa fa-search"> Buscar</i></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" name="filtrar" type="text" class="form-control" placeholder="Ingrese nombre.." onclick="buscarlacomision(event)" autofocus autocomplete="off">
        </div>
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Gestión</th>
                        <th>Convocatoria</th>
                        <th>Miembros (Comisión)</th>
                        <th>Descripción</th>
                        <th>F. de Creacion</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablacomision">
                    <?php
                    /*$i =0;
                    foreach($comision as $c){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $c['comision_nombre']; ?></td>
                        <td class="text-center"><?php echo $c['gestion_descripcion']; ?></td>
                        <td><?php echo $c['admin_nombre']." ".$c['admin_apellido']; ?></td>
                        <td><?php echo $c['comision_descripcion']; ?></td>
                        <td><?php echo date("d/m/Y", strtotime($c['comision_fechacreacion'])); ?></td>
                        <td><?php echo $c['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('comision/edit/'.$c['comision_id']); ?>" class="btn btn-info btn-xs" title="Modificar comisión"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('comision/remove/'.$c['comision_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar comision"><span class="fa fa-trash"></span></a>-->
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }*/ ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<!------------------------ INICIO modal para ver cargos  de la comision ------------------->
<div class="modal fade" id="modal_cargocomision" tabindex="-1" role="dialog" aria-labelledby="modalrequisitolabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <span class="text-bold">CARGOS</span>
            </div>
            <div class="modal-body">
                <!------------------------------------------------------------------->
                <div class="box-body table-responsive">
                    <span id="tablacargo"></span>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer" style="text-align: center">
                <a class="btn btn-success" onclick="registrarcargocomision()"><span class="fa fa-check"></span> Aceptar</a>
                <a class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar</a>
            </div>
        </div>
    </div>
</div>
<!------------------------ F I N  modal para ver cargos  de la comision ------------------->

