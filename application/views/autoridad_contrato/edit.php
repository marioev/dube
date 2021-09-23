<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Autoridad Contrato</h3>
            </div>
            <?php echo form_open('autoridad_contrato/edit/'.$autoridad_contrato['autoridadc_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="gestion_id" class="control-label">Gestión</label>
                        <div class="form-group">
                            <select id="gestion_id" name="gestion_id" class="form-control" required autofocus>
                                <?php 
                                foreach($all_gestion as $gestion)
                                {
                                    $selected = ($gestion['gestion_id'] == $autoridad_contrato['autoridadc_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$gestion['gestion_id'].'" '.$selected.'>'.$gestion['gestion_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="autoridadc_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="autoridadc_nombre" value="<?php echo ($this->input->post('autoridadc_nombre') ? $this->input->post('autoridadc_nombre') : $autoridad_contrato['autoridadc_nombre']); ?>" class="form-control" id="autoridadc_nombre" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('autoridadc_nombre');?></span>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <label for="autoridadc_cargo" class="control-label"><span class="text-danger">*</span>Cargo</label>
                        <div class="form-group">
                            <input type="text" name="autoridadc_cargo" value="<?php echo ($this->input->post('autoridadc_cargo') ? $this->input->post('autoridadc_cargo') : $autoridad_contrato['autoridadc_cargo']); ?>" class="form-control" id="autoridadc_cargo" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('autoridadc_cargo');?></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="autoridadc_orden" class="control-label"><span class="text-danger">*</span>Orden</label>
                        <div class="form-group">
                            <input type="number" min="0" name="autoridadc_orden" value="<?php echo ($this->input->post('autoridadc_orden') ? $this->input->post('autoridadc_orden') : $autoridad_contrato['autoridadc_orden']); ?>" class="form-control" id="autoridadc_orden" autocomplete="off" />
                            <span class="text-danger"><?php echo form_error('autoridadc_orden');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="estado_id" class="control-label">Estado</label>
                        <div class="form-group">
                            <select name="estado_id" id="estado_id" class="form-control">
                                <?php 
                                foreach($all_estado as $estado)
                                {
                                    $selected = ($estado['estado_id'] == $autoridad_contrato['estado_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('gestion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php echo form_close(); ?>
        </div>
    </div>
</div>