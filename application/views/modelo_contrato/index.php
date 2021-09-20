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
    <font size='4' face='Arial'><b>Modelo de Contratos</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($modelo_contrato); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('modelo_contrato/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Modelo Contrato</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre de la beca">
        </div>
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Beca</th>
                        <th>Parte 1</th>
                        <th>Parte 2</th>
                        <th>Parte 3</th>
                        <th>Parte 4</th>
                        <th>Parte 5</th>
                        <th>Parte 6</th>
                        <th>Parte 7</th>
                        <th>Parte 8</th>
                        <th>Parte 9</th>
                        <th>Parte 10</th>
                        <th>Parte 11</th>
                        <th></th>
                    </tr>
                    <?php
                    $i= 0;
                    foreach($modelo_contrato as $mc){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td><?php echo $mc['beca_nombre']; ?></td>
                        <td><?php echo $mc['modeloc_parte1']; ?></td>
                        <td><?php echo $mc['modeloc_parte2']; ?></td>
                        <td><?php echo $mc['modeloc_parte3']; ?></td>
                        <td><?php echo $mc['modeloc_parte4']; ?></td>
                        <td><?php echo $mc['modeloc_parte5']; ?></td>
                        <td><?php echo $mc['modeloc_parte6']; ?></td>
                        <td><?php echo $mc['modeloc_parte7']; ?></td>
                        <td><?php echo $mc['modeloc_parte8']; ?></td>
                        <td><?php echo $mc['modeloc_parte9']; ?></td>
                        <td><?php echo $mc['modeloc_parte10']; ?></td>
                        <td><?php echo $mc['modeloc_parte11']; ?></td>
                        <td>
                            <a href="<?php echo site_url('modelo_contrato/edit/'.$mc['modeloc_id']); ?>" class="btn btn-info btn-xs" title="Modificar modelo contrato"><span class="fa fa-pencil"></span></a> 
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
