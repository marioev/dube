<script src="<?php echo base_url('resources/sumernote/summernote.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/sumernote/summernote.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/modeloc_edit.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="elmodelo_contrato1" id="elmodelo_contrato1" value='<?php echo $modelo_contrato['modeloc_parte1']; ?>' />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Modelo Contrato</h3>
            </div>
            <?php //echo form_open('modelo_contrato/edit/'.$modelo_contrato['modeloc_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="beca_id" class="control-label">Beca</label>
                        <div class="form-group">
                            <select id="beca_id" name="beca_id" class="form-control" required>
                                <?php 
                                foreach($all_beca as $beca)
                                {
                                    $selected = ($beca['beca_id'] == $modelo_contrato['beca_id']) ? ' selected="selected"' : "";
                                    echo '<option value="'.$beca['beca_id'].'" '.$selected.'>'.$beca['beca_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="modeloc_parte1" class="control-label">Parte 1</label>
                        <div class="form-group">
                            <div id="modeloc_parte1"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte1');?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
            	<a onclick="modificar_modelocontrato(<?php echo $modelo_contrato['modeloc_id']; ?>)" class="btn btn-success"><i class="fa fa-check"></i> Guardar</a>
                <a href="<?php echo site_url('modelo_contrato'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php //echo form_close(); ?>
        </div>
    </div>
</div>