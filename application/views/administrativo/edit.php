<!--<script src="<?php //echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>-->
<link href="<?php echo base_url('resources/css/formValidation.css')?>" rel="stylesheet">
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Administrativo</h3>
            </div>
            <?php $attributes = array("name" => "administrativoForm", "id"=>"administrativoForm");
            echo form_open_multipart("administrativo/edit/".$administrativo['admin_id'], $attributes);?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="admin_nombre" class="control-label"><span class="text-danger">*</span>Nombres</label>
                            <div class="form-group">
                                <input type="text" name="admin_nombre" value="<?php echo ($this->input->post('admin_nombre') ? $this->input->post('admin_nombre') : $administrativo['admin_nombre']); ?>" class="form-control" id="admin_nombre" required autofocus autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('admin_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="admin_apellido" class="control-label"><span class="text-danger">*</span>Apellidos</label>
                            <div class="form-group">
                                <input type="text" name="admin_apellido" value="<?php echo ($this->input->post('admin_apellido') ? $this->input->post('admin_apellido') : $administrativo['admin_apellido']); ?>" class="form-control" id="admin_apellido" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                                <span class="text-danger"><?php echo form_error('admin_apellido');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="tipousuario_id" class="control-label"><span class="text-danger">*</span>Tipo Rol</label>
                            <div class="form-group">
                                <select name="tipousuario_id" class="form-control" id="tipousuario_id" required>
                                    <option value="">Tipo de Rol</option>
                                    <?php 
                                    foreach($all_tipo_usuario as $tipo_usuario)
                                    {
                                        $selected = ($tipo_usuario['tipousuario_id'] == $administrativo['tipousuario_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$tipo_usuario['tipousuario_id'].'" '.$selected.'>'.$tipo_usuario['tipousuario_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="admin_ci" class="control-label">C.I.</label>
                            <div class="form-group">
                                <input type="text" name="admin_ci" value="<?php echo ($this->input->post('admin_ci') ? $this->input->post('admin_ci') : $administrativo['admin_ci']); ?>" class="form-control" id="admin_ci" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="admin_email" class="control-label">Email</label>
                            <div class="form-group">
                                <input type="text" name="admin_email" value="<?php echo ($this->input->post('admin_email') ? $this->input->post('admin_email') : $administrativo['admin_email']); ?>" class="form-control" id="admin_email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="admin_profesion" class="control-label">Profesión</label>
                            <div class="form-group">
                                <input type="text" name="admin_profesion" value="<?php echo ($this->input->post('admin_profesion') ? $this->input->post('admin_profesion') : $administrativo['admin_profesion']); ?>" class="form-control" id="admin_profesion" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <!--<div class="col-md-6">
                            <label for="admin_cargo" class="control-label">Admin Cargo</label>
                            <div class="form-group">
                                <input type="text" name="admin_cargo" value="<?php //echo ($this->input->post('admin_cargo') ? $this->input->post('admin_cargo') : $administrativo['admin_cargo']); ?>" class="form-control" id="admin_cargo" />
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <label for="admin_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="admin_telefono" value="<?php echo ($this->input->post('admin_telefono') ? $this->input->post('admin_telefono') : $administrativo['admin_telefono']); ?>" class="form-control" id="admin_telefono" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="admin_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                <input type="text" name="admin_celular" value="<?php echo ($this->input->post('admin_celular') ? $this->input->post('admin_celular') : $administrativo['admin_celular']); ?>" class="form-control" id="admin_celular" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cargo_id" class="control-label">Cargo</label>
                            <div class="form-group">
                                <select name="cargo_id" class="form-control">
                                    <!--<option value="">select cargo</option>-->
                                    <?php 
                                    foreach($all_cargo as $cargo)
                                    {
                                        $selected = ($cargo['cargo_id'] == $administrativo['cargo_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$cargo['cargo_id'].'" '.$selected.'>'.$cargo['cargo_nombre'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="direccionuniv_id" class="control-label">Direccion Universitaria</label>
                            <div class="form-group">
                                <select name="direccionuniv_id" class="form-control">
                                    <!--<option value="">select direccion_universitaria</option>-->
                                    <?php
                                    foreach($all_direccion_universitaria as $direccion_universitaria)
                                    {
                                        $selected = ($direccion_universitaria['direccionuniv_id'] == $administrativo['direccionuniv_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$direccion_universitaria['direccionuniv_id'].'" '.$selected.'>'.$direccion_universitaria['direccionuniv_nombre'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="admin_login" class="control-label"><span class="text-danger">*</span>Login</label>
                            <div class="form-group">
                                <input type="text" name="admin_login" value="<?php echo $administrativo['admin_login'] ?>" class="form-control" id="admin_login" required/>
                                <span class="text-danger"><?php echo form_error('admin_login');?></span>
                                <div id="user-result"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <!--<option value="">select estado</option>-->
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $administrativo['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="admin_imagen" class="control-label">Imagen</label>
                            <div class="form-group">
                                <input type="file" name="admin_imagen"  id="admin_imagen" kl_virtual_keyboard_secure_input="on" class="form-control.input">
                                <small class="help-block" data-fv-result="INVALID" data-fv-for="chivo" data-fv-validator="notEmpty" style=""></small>
                                <h4 id='loading' ></h4>
                                <div id="message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $laimagen = "default.jpg";
                            if($administrativo["admin_imagen"] != "" && $administrativo["admin_imagen"] != null){
                                $laimagen = $administrativo["admin_imagen"];
                            }
                            ?>
                            <img src="<?php echo base_url('resources/images/administrativo/'.$laimagen); ?>" id="previewing" class="img-responsive center-block">
                            <input type="hidden" value="<?php echo $administrativo['admin_id'] ?>" name="userid" id="userid">
                            <input type="hidden" value="<?php echo $administrativo['admin_imagen'] ?>" name="foto">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" id="boton" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('administrativo'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#administrativoForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                tipousuario_id:{
                    validators:{
                        notEmpty: {
                            message: 'Elegir un tipo de usuario'
                        }
                    }
                },

                admin_nombre: {
                    validators: {
                        notEmpty: {
                            message: 'Nombre es un campo requerido'
                        },
                        stringLength: {
                            min: 3,
                            max: 150,
                            message: 'Nombre debe tener al menos 3 caracteres y maximo 150'
                        }
                    }
                },
                  admin_email: {
                    validators: {
                        /*notEmpty: {
                            message: 'Email es un campo requerido'
                        },*/
                        emailAddress: {
                            message: 'Entrada no es un email valido'
                        }
                    }
                },
                admin_imagen: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 26214400,   // 2048 * 1024
                            message: 'El archivo seleccionado no es valido, Tamaño Maximo 25 Mb'
                        }
                    }
                }
            }
        });


        $(function() {
            $("#admin_imagen").change(function() {

                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
                {
                    $('#previewing').attr('src','default.png');
                    $("#message").html("<p id='error'>Seleccione archivo valido</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                }
                else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function imageIsLoaded(e) {
            $("#admin_imagen").css("color","green");
            $('#image_preview').css("display", "block");
            $('#previewing').attr('src', e.target.result);
            $('#previewing').attr('width', '50%');
            $('#previewing').attr('height', '59%');
        };

        var x_timer;
        $("#admin_login").keyup(function (e){
            clearTimeout(x_timer);
            var user_login = $(this).val();
            var user_id = $('#userid').val();
            //if(  isNaN(user_numero) ){
            x_timer = setTimeout(function(){
                check_login_ajax(user_login, user_id);
            }, 1000);
            //}
        });

        function check_login_ajax(userlogin,userid){

            var parametros = {
                'login':userlogin,
                'uid': userid
            };

            //console.log('log:'+userlogin+' ,uid:'+userid);

            $.ajax({
                data:  parametros,
                url:   '<?php echo base_url('admin/dashb/haylogin2')?>',
                type:  'post',
//                    dataType: "json",
                beforeSend: function () {
                    /// $("#registrando").html("<h5>Procesando, espere por favor...</h5>");
                    $("#user-result").html('<img src="<?php echo base_url('resources/images/loader.gif')?>" />');
                },
                success:  function (response) {
                    console.log(response);
                    if(response=='1'){
                        $("#user-result").html('<small style="color: #f0120a;" class="help-block"><i class="fa fa-close"></i> El login: '+userlogin+' Ya esta en uso, elija otro</small>');
                        $("#administrativoForm").attr('class', 'form-group has-feedback has-error');
                        $("#boton").attr( "disabled","disabled" );
                    }
                    if(response=='0'){
                        $("#user-result").html('<i class="fa fa-check" style="color: #00CC00;"></i>');
                        $("#administrativoForm").attr('class', 'form-group');
                        $("#boton").removeAttr("disabled");
                    }
                }
            });
        }


    });
</script>

<script src="<?php echo base_url('resources/js/formValidation.js');?>"></script>
<script src="<?php echo base_url('resources/js/formValidationBootstrap.js');?>"></script>
