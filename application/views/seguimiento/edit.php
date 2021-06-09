<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Seguimiento</h3>
                <br><br><span><b>Becario: </b><?php echo $postulante["estudiante_apellidos"]." ".$postulante["estudiante_nombre"]; ?></span>
            </div>
            <?php echo form_open_multipart('seguimiento/edit/'.$postulante_id); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="seguimiento_descripcion" class="control-label"><span class="text-danger">*</span>Descripción</label>
                            <div class="form-group">
                                <input type="text" name="seguimiento_descripcion" value="<?php echo ($this->input->post('seguimiento_descripcion') ? $this->input->post('seguimiento_descripcion') : $seguimiento['seguimiento_descripcion']); ?>" class="form-control" id="seguimiento_descripcion" autofocus autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="seguimiento_mes" class="control-label">Mes</label>
                            <div class="form-group" style="display: flex">
                                <select class="form-control" name="seguimiento_mes" id="seguimiento_mes">
                                    <!--<option value="">select estudiante</option>-->
                                    <?php
                                    $all_mes =["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
                                    for($index = 0; $index < count($all_mes); $index++){
                                        $selected = ($all_mes[$index] == $seguimiento['seguimiento_mes']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$all_mes[$index].'" '.$selected.'>'.$all_mes[$index].'</option>';
                                    
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="seguimiento_gestion" class="control-label"><span class="text-danger">*</span>Gestión</label>
                            <div class="form-group">
                                <input type="text" name="seguimiento_gestion" value="<?php echo ($this->input->post('seguimiento_gestion') ? $this->input->post('seguimiento_gestion') : $seguimiento['seguimiento_gestion']); ?>" class="form-control" id="seguimiento_gestion" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="seguimiento_respaldo" class="control-label">Respaldo</label>
                            <div class="form-group">
                                <input type="file" name="seguimiento_respaldo" value="<?php echo $this->input->post('seguimiento_respaldo'); ?>" class="form-control" id="seguimiento_respaldo" />
                                <input type="hidden" name="seguimiento_respaldo1" value="<?php echo ($this->input->post('seguimiento_respaldo') ? $this->input->post('seguimiento_respaldo') : $seguimiento['seguimiento_respaldo']); ?>" class="form-control" id="seguimiento_respaldo1" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="seguimiento_fecha" class="control-label"><span class="text-danger">*</span>Fecha</label>
                            <div class="form-group">
                                <input type="date" name="seguimiento_fecha" value="<?php echo ($this->input->post('seguimiento_fecha') ? $this->input->post('seguimiento_fecha') : $seguimiento['seguimiento_fecha']); ?>" class="form-control" id="seguimiento_fecha" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="seguimiento_hora" class="control-label"><span class="text-danger">*</span>Hora</label>
                            <div class="form-group">
                                <input type="time" step="any" name="seguimiento_hora" value="<?php echo ($this->input->post('seguimiento_hora') ? $this->input->post('seguimiento_hora') : $seguimiento['seguimiento_hora']); ?>" class="form-control" id="seguimiento_hora" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>