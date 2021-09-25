<script src="<?php echo base_url('resources/sumernote/summernote.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/sumernote/summernote.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/modeloc_add.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Modelo Contrato</h3>
            </div>
            <?php //echo form_open('modelo_contrato/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="beca_id" class="control-label">Beca</label>
                        <div class="form-group">
                            <select id="beca_id" name="beca_id" class="form-control" required>
                                <?php 
                                foreach($all_beca as $beca)
                                {
                                    echo '<option value="'.$beca['beca_id'].'">'.$beca['beca_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="modeloc_parte1" class="control-label">Modelo</label>
                        <div class="form-group">
                            <div id="modeloc_parte1"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte1');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <a onclick="registrar_modelocontrato()" class="btn btn-success"><i class="fa fa-check"></i> Guardar</a>
                <a href="<?php echo site_url('modelo_contrato'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </div>
            <?php //echo form_close(); ?>
      	</div>
    </div>
</div>