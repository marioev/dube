<script src="<?php echo base_url('resources/sumernote/summernote.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/sumernote/summernote.css'); ?>" rel="stylesheet">
<script src="<?php echo base_url('resources/js/modeloc_edit.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="elmodelo_contrato1" id="elmodelo_contrato1" value='<?php echo $modelo_contrato['modeloc_parte1']; ?>' />
<input type="hidden" name="elmodelo_contrato2" id="elmodelo_contrato2" value='<?php echo $modelo_contrato['modeloc_parte2']; ?>' />
<input type="hidden" name="elmodelo_contrato3" id="elmodelo_contrato3" value='<?php echo $modelo_contrato['modeloc_parte3']; ?>' />
<input type="hidden" name="elmodelo_contrato4" id="elmodelo_contrato4" value='<?php echo $modelo_contrato['modeloc_parte4']; ?>' />
<input type="hidden" name="elmodelo_contrato5" id="elmodelo_contrato5" value='<?php echo $modelo_contrato['modeloc_parte5']; ?>' />
<input type="hidden" name="elmodelo_contrato6" id="elmodelo_contrato6" value='<?php echo $modelo_contrato['modeloc_parte6']; ?>' />
<input type="hidden" name="elmodelo_contrato7" id="elmodelo_contrato7" value='<?php echo $modelo_contrato['modeloc_parte7']; ?>' />
<input type="hidden" name="elmodelo_contrato8" id="elmodelo_contrato8" value='<?php echo $modelo_contrato['modeloc_parte8']; ?>' />
<input type="hidden" name="elmodelo_contrato9" id="elmodelo_contrato9" value='<?php echo $modelo_contrato['modeloc_parte9']; ?>' />
<input type="hidden" name="elmodelo_contrato10" id="elmodelo_contrato10" value='<?php echo $modelo_contrato['modeloc_parte10']; ?>' />
<input type="hidden" name="elmodelo_contrato11" id="elmodelo_contrato11" value='<?php echo $modelo_contrato['modeloc_parte11']; ?>' />
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
                    <div class="col-md-6">
                        <label for="modeloc_parte1" class="control-label">Parte 1</label>
                        <div class="form-group">
                            <div id="modeloc_parte1"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte1');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte2" class="control-label">Parte 2</label>
                        <div class="form-group">
                            <div id="modeloc_parte2"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte2');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte3" class="control-label">Parte 3</label>
                        <div class="form-group">
                            <div id="modeloc_parte3"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte3');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte4" class="control-label">Parte 4</label>
                        <div class="form-group">
                            <div id="modeloc_parte4"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte4');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte5" class="control-label">Parte 5</label>
                        <div class="form-group">
                            <div id="modeloc_parte5"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte5');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte6" class="control-label">Parte 6</label>
                        <div class="form-group">
                            <div id="modeloc_parte6"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte6');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte7" class="control-label">Parte 7</label>
                        <div class="form-group">
                            <div id="modeloc_parte7"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte7');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte8" class="control-label">Parte 8</label>
                        <div class="form-group">
                            <div id="modeloc_parte8"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte8');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte9" class="control-label">Parte 9</label>
                        <div class="form-group">
                            <div id="modeloc_parte9"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte9');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte10" class="control-label">Parte 10</label>
                        <div class="form-group">
                            <div id="modeloc_parte10"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte10');?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modeloc_parte11" class="control-label">Parte 11</label>
                        <div class="form-group">
                            <div id="modeloc_parte11"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte11');?></span>
                        </div>
                    </div>
                    
                    
                        
                </div>
            </div>
            <div class="box-footer">
            	<a onclick="modificar_modelocontrato(<?php echo $modelo_contrato['modeloc_id']; ?>)" class="btn btn-success"><i class="fa fa-check"></i> Guardar</a>
                <a href="<?php echo site_url('gestion'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>				
            <?php //echo form_close(); ?>
        </div>
    </div>
</div>