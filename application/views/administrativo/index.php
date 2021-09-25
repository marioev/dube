<!--<script src="<?php //echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>-->
<link href="<?php echo base_url('resources/css/formValidation.css')?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/administrativo_index.js'); ?>" type="text/javascript"></script>
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
<style type="text/css">
    #contieneimg{
        width: 100px;
        height: 100px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
</style>
<div class="box-header">
    <font size='4' face='Arial'><b>Administrativo</b></font>
    <br><font size='2' face='Arial'>Registros Encontrados: <?php echo sizeof($administrativo); ?></font>
    <div class="box-tools no-print">
        <a href="<?php echo site_url('administrativo/add'); ?>" class="btn btn-success btn-sm"><fa class='fa fa-pencil-square-o'></fa> Registrar Administrativo</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="input-group no-print"> <span class="input-group-addon">Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre, apellido, login, email..">
        </div>
        <div class="box">
            <!-- <?php if($this->session->flashdata('msg')): ?>
                <p><?php echo $this->session->flashdata('msg'); ?></p>
            <?php endif; ?> --> 
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Nombres</th>
                        <th>Login</th>
                        <th>Profesión</th>
                        <!--<th>AdminCargo</th>-->
                        <th>Cargo</th>
                        <th>Direccion Univ.</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php
                    $i = 0;
                    foreach($administrativo as $a){ ?>
                    <tr>
                        <td class="text-center"><?php echo $i+1; ?></td>
                        <td>
                            <center>
                            <?php
                            if($a['admin_imagen'] == "" || $a['admin_imagen'] == null){
                                $laimagen = "default.jpg";
                            }else{
                                $laimagen = $a['admin_imagen'];
                            }
                            echo "<img src='".site_url()."/resources/images/administrativo/"."thumb_".$laimagen."' width='40' height='40' class='img-circle'"; ?>
                            </center>
                        <td>
                            <div id="horizontal">
                            <?php
                            $tamaniofont = "13px";
                            if(strlen($a["admin_nombre"]." ".$a['admin_apellido']) >27){
                                $tamaniofont = "10px";
                            }
                            echo "<span class='text-bold' style='font-size: ".$tamaniofont."'>".$a['admin_nombre']." ".$a['admin_apellido']."</span>";
                            ?>
                            </div>
                            <div style="line-height: 0.8">
                                <span style="font-size: 9px"><b>C.I.: </b><?php echo $a['admin_ci']; ?></span>
                                <br><span style="font-size: 9px"><b>Email: </b><?php echo $a['admin_email']; ?></span>
                                <br><span style="font-size: 9px"><b>Telef.: </b><?php echo $a['admin_telefono']; ?></span>
                                <br><span style="font-size: 9px"><b>Cel.: </b><?php echo $a['admin_celular']; ?></span>
                            </div>
                        </td>
                        <td><?php echo $a['admin_login']; ?></td>
                        <td><?php echo $a['admin_profesion']; ?></td>
                        <!--<td><?php //echo $a['admin_cargo']; ?></td>-->
                        <td><?php echo $a['cargo_nombre']; ?></td>
                        <td><?php echo $a['direccionuniv_nombre']; ?></td>
                        <td><?php echo $a['estado_descripcion']; ?></td>
                        <td>
                            <a href="<?php echo site_url('administrativo/edit/'.$a['admin_id']); ?>" class="btn btn-info btn-xs" title="Modificar administrativo"><span class="fa fa-pencil"></span></a> 
                            <!-- <a href="<?php //echo site_url('administrativo/cambiar/'.$a['admin_id']); ?>" class="btn btn-danger btn-xs" title="Eliminar Administrativo"><span class="fa fa-trash"></span></a> -->
                            <a class="btn btn-facebook btn-xs" onclick="mostrar_modalcambiar(<?php echo $a['admin_id']; ?>)" title="Cambiar contraseña"><em class="fa fa-asterisk"></em></a>
                            
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
<!------------------------ INICIO modal para cambiar PASSWORD ------------------->
<div class="modal fade" id="modalcambiar" tabindex="-1" role="dialog" aria-labelledby="modalcambiarlabel">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header text-center text-bold" style="font-size: 12pt">
                <label>CAMBIAR CONTRASEÑA</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <?php
                $attributes = array("name" => "adminForm", "id"=>"adminForm");
                echo form_open('administrativo/nueva_clave', $attributes);
            ?>
            <div class="modal-body" style="font-size: 10pt">
                <!------------------------------------------------------------------->
                <div class="col-md-6">
                    <label for="nuevo_pass" class="control-label">Nueva Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="nuevo_pass" class="form-control" id="nuevo_pass" />
                        <input type="hidden" name="es_adminid" class="form-control" id="es_adminid" />
                        <span class="text-danger"><?php echo form_error('nuevo_pass'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="repita_pass" class="control-label">Repita Contraseña</label>
                    <div class="form-group">
                        <input type="password" name="repita_pass" class="form-control" id="repita_pass" />
                        <span class="text-danger"><?php echo form_error('repita_pass'); ?></span>
                    </div>
                </div>
                <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Cambiar
                </button>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Cancelar </a>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
<!------------------------ FIN modal para cambiar PASSWORD ------------------->
<script>
    $(document).ready(function() {

        $('#adminForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nuevo_pass:{
                    validators:{
                        notEmpty: {
                            message: 'Password es obligatorio'
                        }
                    }
                },
                repita_pass: {
                    validators: {
                        notEmpty: {
                            message: 'Repetir Password es obligatorio'
                        },
                        identical: {
                            field: 'nuevo_pass',
                            message: 'Los campos no son iguales, vuelva a intentar'
                        }
                    }
                }
            }
        });
        
    });
</script>

<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>