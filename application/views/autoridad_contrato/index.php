<!--<script src="<?php //echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>-->
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
    <font size='4' face='Arial'><b>Autoridad Contrato</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($autoridad_contrato); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('autoridad_contrato/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Autoridad Contrato</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre o cargo">
        </div>
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th class="text-center">C.I.</th>
                        <th>Cargo</th>
                        <th>Gestion</th>
                        <th>Orden</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <?php
                    $i= 0;
                    foreach($autoridad_contrato as $ac){ ?>
                    <tr style="background: <?php echo $ac['estado_color']; ?>">
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $ac['autoridadc_nombre']; ?></td>
                        <td  class="text-center"><?php echo $ac['autoridadc_ci']; ?></td>
                        <td><?php echo $ac['autoridadc_cargo']; ?></td>
                        <td><?php echo $ac['gestion_descripcion']; ?></td>
                        <td><?php echo $ac['autoridadc_orden']; ?></td>
                        <td class="text-center"><?php echo $ac['estado_descripcion'] ?></td>
                        <td>
                            <a href="<?php echo site_url('autoridad_contrato/edit/'.$ac['autoridadc_id']); ?>" class="btn btn-info btn-xs" title="Modificar gestión"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('gestion/remove/'.$ac['gestion_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar gestión"><span class="fa fa-trash"></span> Delete</a>-->
                        </td>
                    </tr>
                    <?php
                    $i++;
                    } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
