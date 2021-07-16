<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<!--<script src="<?php //echo base_url('resources/js/postulante_index.js'); ?>" type="text/javascript"></script>-->
<script type="text/javascript">
    /*$(document).ready(function () {
        (function ($) {
            $('#filtrar').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.buscar tr').hide();
                $('.buscar tr').filter(function () {
                    return rex.test($(this).text());
                }).show();
            })
        }(jQuery));
    });*/
</script>
<script type="text/javascript">
        /*$(document).ready(function () {
            (function ($) {
                $('#buscarrequisito').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscarreq tr').hide();
                    $('.buscarreq tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });*/
</script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!--<input type="hidden" name="ver_requisitos" id="ver_requisitos" value="<?php //echo $ver_requisitos; ?>" />-->
<div class="box-header">
    <font size='4' face='Arial'><b>Seguimiento</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($seguimientos); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('seguimiento/add/'.$postulante["postulante_id"]); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Seguimiento</a>
    </div><br><br>
    <font size='4' face='Arial'><b>Becario: </b><?php echo $postulante["estudiante_apellidos"]." ".$postulante["estudiante_nombre"]; ?></font>
    <br><span><b>C.I.: </b><?php echo $postulante["estudiante_ci"]; ?></span>
    <br><span><b>Gestión: </b><?php echo $postulante["gestion_descripcion"]; ?></span>
    <br><span><b>Convocatoria: </b><?php echo $postulante["convocatoria_titulo"]; ?></span>
    <br><span><b>Tipo de Beca: </b><?php echo $postulante["beca_nombre"]; ?></span>
    
    <?php
    if($solicitud_unidadpostulante != ""){
    ?>
    <br><span><b>Unidad Solicitante: </b><?php echo $solicitud_unidadpostulante["solicitud_unidad"]." (".$solicitud_unidadpostulante["unidad_responsable"].")"; ?></span>
    <br><span><b>Unidad: </b><?php echo $solicitud_unidadpostulante["unidad_nombre"]."/".$solicitud_unidadpostulante["unidad_dependencia"]; ?></span>
    <?php
    }
    if($postulante["beca_id"] == 5){ // 5 => BECA DEPORTE
        if($postulante["postulante_caracteristica"] != "" || $postulante["postulante_caracteristica"] != null){
    ?>
            <br><span><b>Disciplina: </b><?php echo $postulante["postulante_caracteristica"]; ?></span>
    <?php
        }else{
        ?>
            <br><span><b>Disciplina: </b>
                <?php echo form_open_multipart('seguimiento/guardarcarac/'.$postulante['postulante_id']); ?>
                    <input type="text" name="postulante_caracteristica" class="form-control" id="postulante_caracteristica" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                <?php echo form_close(); ?>
                </span>
        <?php
        }
    }
    if($postulante["beca_id"] == 6){ // 6 => BECA CULTURA
        if($postulante["postulante_caracteristica"] != "" || $postulante["postulante_caracteristica"] != null){
    ?>
            <br><span><b>Aptitud Artistica o Destreza: </b><?php echo $postulante["postulante_caracteristica"]; ?></span>
    <?php
        }else{
        ?>
            <br><span><b>Aptitud Artistica o Destreza: </b>
                <?php echo form_open_multipart('seguimiento/guardarcarac/'.$postulante['postulante_id']); ?>
                    <input type="text" name="postulante_caracteristica" class="form-control" id="postulante_caracteristica" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                <?php echo form_close(); ?>
                </span>
        <?php
        }
    }
    ?>
    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese descripción..">
        </div>
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Mes</th>
                        <th>Gestión</th>
                        <th>Documento</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar" id="tablapostulantes">
                    <?php
                    $i = 0;
                    foreach($seguimientos as $s){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $s['seguimiento_descripcion']; ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($s['seguimiento_fecha'])); ?></td>
                        <td><?php echo $s['seguimiento_hora']; ?></td>
                        <td><?php echo $s['seguimiento_mes']; ?></td>
                        <td><?php echo $s['seguimiento_gestion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('/resources/images/seguimiento/'.$s['seguimiento_respaldo']) ?>" target="_blank"><?php echo $s['seguimiento_respaldo']; ?></a>
                        </td>
                        <td>
                            <a href="<?php echo site_url('seguimiento/edit/'.$s['seguimiento_id']); ?>" class="btn btn-info btn-xs" title="Modificar postulante"><span class="fa fa-pencil"></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
<a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
    <i class="fa fa-times"></i> Cancelar</a>

