<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Postulante</h3>
            </div>
            <?php echo form_open('postulante/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="estudiante_id" class="control-label">Estudiante</label>
                            <div class="form-group">
                                <select name="estudiante_id" class="form-control">
                                    <!--<option value="">select estudiante</option>-->
                                    <?php 
                                    foreach($all_estudiante as $estudiante)
                                    {
                                        $selected = ($estudiante['estudiante_id'] == $this->input->post('estudiante_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estudiante['estudiante_id'].'" '.$selected.'>'.$estudiante['estudiante_apellidos']." ".$estudiante['estudiante_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="plaza_id" class="control-label">Plazas</label>
                            <div class="form-group">
                                <select name="plaza_id" class="form-control">
                                    <!--<option value="">select plazas_beca</option>-->
                                    <?php 
                                    foreach($all_plazas_becas as $plazas_beca)
                                    {
                                        $selected = ($plazas_beca['plaza_id'] == $this->input->post('plaza_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$plazas_beca['plaza_id'].'" '.$selected.'>'.$plazas_beca['plaza_cantidad'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="padres_tutores" class="control-label">Padres Tutores</label>
                            <div class="form-group">
                                <input type="text" name="padres_tutores" value="<?php echo $this->input->post('padres_tutores'); ?>" class="form-control" id="padres_tutores" autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="postulante_observacion" class="control-label">Observación</label>
                            <div class="form-group">
                                <textarea name="postulante_observacion" class="form-control" id="postulante_observacion"><?php echo $this->input->post('postulante_observacion'); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="postulante_correccion" class="control-label">Corrección</label>
                            <div class="form-group">
                                <textarea name="postulante_correccion" class="form-control" id="postulante_correccion"><?php echo $this->input->post('postulante_correccion'); ?></textarea>
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