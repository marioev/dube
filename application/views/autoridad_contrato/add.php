<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Autoridad Contrato</h3>
            </div>
            <?php echo form_open('autoridad_contrato/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <label for="gestion_id" class="control-label">Gestión</label>
                        <div class="form-group">
                            <select id="gestion_id" name="gestion_id" class="form-control" required autofocus>
                                <?php 
                                foreach($all_gestion as $gestion)
                                {
                                    $selected = ($gestion['estado_id'] == 9) ? ' selected="selected"' : "";
                                    echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="autoridadc_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="autoridadc_nombre" value="<?php echo $this->input->post('autoridadc_nombre'); ?>" class="form-control" id="autoridadc_nombre" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('autoridadc_nombre');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="autoridadc_ci" class="control-label"><span class="text-danger">*</span>C.I.</label>
                        <div class="form-group">
                            <input type="text" name="autoridadc_ci" value="<?php echo $this->input->post('autoridadc_ci'); ?>" class="form-control" id="autoridadc_ci" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('autoridadc_ci');?></span>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label for="autoridadc_cargo" class="control-label"><span class="text-danger">*</span>Cargo</label>
                        <div class="form-group">
                            <input type="text" name="autoridadc_cargo" value="<?php echo $this->input->post('autoridadc_cargo'); ?>" class="form-control" id="autoridadc_cargo" required autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('autoridadc_cargo');?></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="autoridadc_orden" class="control-label"><span class="text-danger">*</span>Orden</label>
                        <div class="form-group">
                            <input type="number" min="0" name="autoridadc_orden" value="<?php echo $this->input->post('autoridadc_orden'); ?>" class="form-control" id="autoridadc_orden" required autocomplete="off" />
                            <span class="text-danger"><?php echo form_error('autoridadc_orden');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                <a href="<?php echo site_url('autoridad_contrato'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>