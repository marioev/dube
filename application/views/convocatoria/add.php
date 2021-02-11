<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Convocatoria</h3>
            </div>
            <?php echo form_open_multipart('convocatoria/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <label for="convocatoria_descripcion" class="control-label"><span class="text-danger">*</span>Descripción</label>
                            <div class="form-group">
                                <input type="text" name="convocatoria_descripcion" value="<?php echo $this->input->post('convocatoria_descripcion'); ?>" class="form-control" id="convocatoria_descripcion" autofocus autocomplete="off" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="gestion_id" class="control-label">Gestion</label>
                            <div class="form-group">
                                <select name="gestion_id" class="form-control">
                                    <?php 
                                    foreach($all_gestion as $gestion)
                                    {
                                        echo '<option value="'.$gestion['gestion_id'].'">'.$gestion['gestion_descripcion'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="convocatoria_fechalimite" class="control-label"><span class="text-danger">*</span>Fecha Limite</label>
                            <div class="form-group">
                                <input type="date" name="convocatoria_fechalimite" value="<?php echo ($this->input->post('convocatoria_fechalimite') ? $this->input->post('convocatoria_fechalimite') : date('Y-m-d')); ?>" class="form-control" id="convocatoria_fechalimite" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="convocatoria_dcto" class="control-label"><span class="text-danger">*</span>Documento</label>
                            <div class="form-group">
                                <input type="file" name="convocatoria_dcto" value="<?php echo $this->input->post('convocatoria_dcto'); ?>" class="form-control" id="convocatoria_dcto" required/>
                            </div>
                        </div>
                    </div>
                </div>
          	<div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Guardar
                    </button>
                    <a href="<?php echo site_url('convocatoria'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>