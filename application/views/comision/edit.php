<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/elegircomisionedit.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="estaconvocatoria_id" id="estaconvocatoria_id" value="<?php echo $comision['convocatoria_id']; ?>" />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Comisión</h3>
            </div>
            <?php echo form_open('comision/edit/'.$comision['comision_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="comision_nombre" class="control-label"><span class="text-danger">*</span>Comision Nombre</label>
                            <div class="form-group">
                                <input type="text" name="comision_nombre" value="<?php echo ($this->input->post('comision_nombre') ? $this->input->post('comision_nombre') : $comision['comision_nombre']); ?>" class="form-control" id="comision_nombre" />
                                <span class="text-danger"><?php echo form_error('comision_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_id" class="control-label">Gestion</label>
                            <div class="form-group">
                                <select name="gestion_id" class="form-control" id="gestion_id" onchange="mostrar_convocatoria(this.value)">
                                    <!--<option value="">select gestion</option>-->
                                    <?php 
                                    foreach($all_gestion as $gestion)
                                    {
                                        $selected = ($gestion['gestion_id'] == $comision['gestion_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="convocatoria_id" class="control-label"><span class="text-danger">*</span>Convocatoria</label>
                            <div class="form-group">
                                <select name="convocatoria_id" class="form-control" id="convocatoria_id" required>
                                    <option value="">Seleccione una convocatoria</option>
                                </select>
                            </div>
                        </div>
                        <div class="panel panel-primary col-md-12" style="border:none;" >
                            <div class="col-md-12 no-print">
                                <h4 align="center" class="no-print"><p>
                                    Seleccione el/los administrativo(s) que conformaran la comisión<br>
                                    </p>
                                </h4>
                                <div class="col-md-5 no-print">
                                    <label for="admin_pasar" class="control-label">Administrativo(s):</label>
                                    <select name="admin_pasar[]" style="width: 100%;" id="admin_pasar" size="6" class="no-print" multiple>
                                        <?php 
                                        foreach($all_administrativo as $administrativo)
                                        {
                                            $band = true;
                                            foreach($all_comision_administrativo as $admini){
                                                if($admini['admin_id'] == $administrativo['admin_id']){
                                                    $band = false;
                                                    break;
                                                }
                                            }
                                            if($band == true){
                                                echo '<option value="'.$administrativo['admin_id'].'" >'.$administrativo['admin_apellido']." ".$administrativo['admin_nombre']." (".$administrativo['cargo_nombre'].')</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2 no-print" align="center">
                                    <input type="button" class="btn btn-primary btn-sm" name="agregar" onclick="aniadir()" value="A&ntilde;adir -->>" style="margin:  11px;"><br>
                                    <input type="button" class="btn btn-primary btn-sm" name="sacar" onclick="quitar()" value="<<-- Quitar" style="margin:  11px;">
                                </div>
                                <div class="col-md-5">
                                    <label for="admin_quitar" class="control-label">Administrativo(s) seleccionados:</label>
                                    <select name="admin_quitar[]" style="width: 100%;" id="admin_quitar" size="6" class="no-print" multiple required >
                                        <?php 
                                        foreach($all_comision_administrativo as $cadministrativo)
                                        {
                                            echo '<option value="'.$cadministrativo['admin_id'].'">'.$cadministrativo['admin_apellido']." ".$cadministrativo['admin_nombre']." (".$administrativo['cargo_nombre'].')</option>';
                                        } 
                                        ?>
                                    </select>
                                    <!--<span class="text-danger"><?php //echo form_error('admin_quitar');?></span>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="comision_descripcion" class="control-label">Descripción</label>
                            <div class="form-group">
                                <input type="text" name="comision_descripcion" value="<?php echo ($this->input->post('comision_descripcion') ? $this->input->post('comision_descripcion') : $comision['comision_descripcion']); ?>" class="form-control" id="comision_descripcion" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="comision_fechacreacion" class="control-label">Fecha de Creacion</label>
                            <div class="form-group">
                                <input type="date" name="comision_fechacreacion" value="<?php echo ($this->input->post('comision_fechacreacion') ? $this->input->post('comision_fechacreacion') : $comision['comision_fechacreacion']); ?>" class="form-control" id="comision_fechacreacion" />
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
                                        $selected = ($estado['estado_id'] == $comision['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" onclick="seleccionar()" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('comision'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>