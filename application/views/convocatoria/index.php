<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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

<div class="box-header">
    <font size='4' face='Arial'><b>Convocatoria</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($convocatoria); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('convocatoria/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Convocatoria</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese la descripción de la convocatoria..">
        </div>
        <div class="box">            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Gestion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                        <th>Fecha limite</th>
                        <th>Documento</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i= 0;
                    foreach($convocatoria as $c){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $c['gestion_descripcion']; ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($c['convocatoria_fecha'])); ?></td>
                        <td><?php echo $c['convocatoria_hora']; ?></td>
                        <td><?php echo $c['convocatoria_descripcion']; ?></td>
                        <td class="text-center"><?php echo date("d/m/Y", strtotime($c['convocatoria_fechalimite'])); ?></td>
                        <td>
                            <a href="<?php echo site_url('/resources/images/convocatoria/'.$c['convocatoria_dcto']) ?>" target="_blank"><?php echo $c['convocatoria_dcto']; ?></a>
                        </td>
                        <td><?php echo $c['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('convocatoria/edit/'.$c['convocatoria_id']); ?>" class="btn btn-info btn-xs" title="Modificar convocatoria"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('convocatoria/remove/'.$c['convocatoria_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar convocatoria"><span class="fa fa-trash"></span></a>-->
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
