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
    <font size='4' face='Arial'><b>Requisito</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($requisito); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('requisito/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Requisito</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre del cargo">
        </div>
        <div class="box">
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Beca</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($requisito as $r){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $r['requisito_nombre']; ?></td>
                        <td><?php
                            if($r['beca_nombre'] == "" || $r['beca_nombre'] == null){
                                echo "REQUISITO GENERAL";
                            }else{ echo $r['beca_nombre'];}
                            ?>
                        </td>
                        <td><?php echo $r['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('requisito/edit/'.$r['requisito_id']); ?>" class="btn btn-info btn-xs" title="Modificar requisito"><span class="fa fa-pencil"></span></a> 
                            <!--<a href="<?php //echo site_url('requisito/remove/'.$r['requisito_id']); ?>" class="btn btn-danger btn-xs" title="Elimiar requisito"><span class="fa fa-trash"></span></a>-->
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
