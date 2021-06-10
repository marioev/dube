<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Subir documento Upsi</h3>
                <br><br><span><b>Convocatoria: </b><?php echo $convocatoria["convocatoria_titulo"]; ?></span>
            </div>
            <?php echo form_open_multipart('convocatoria/docupsi/'.$convocatoria["convocatoria_id"]); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-5">
                            <label for="convocatoria_docupsi" class="control-label"><span class="text-danger">*</span>Documento</label>
                            <div class="form-group">
                                <input type="file" name="convocatoria_docupsi" value="<?php echo $this->input->post('convocatoria_docupsi'); ?>" class="form-control" id="convocatoria_docupsi" required />
                                <input type="hidden" name="convocatoria_id" value="<?php echo $convocatoria["convocatoria_id"]; ?>" class="form-control" id="convocatoria_id" />
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