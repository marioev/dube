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
                    <div class="col-md-10">
                        <label for="beca_id" class="control-label">Beca</label>
                        <div class="form-group">
                            <select id="beca_id" name="beca_id" class="form-control" required onchange="mostrar_compromiso()">
                                <?php 
                                foreach($all_beca as $beca)
                                {
                                    echo '<option value="'.$beca['beca_id'].'">'.$beca['beca_nombre'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*la_beca*</span><span> => Nombre de la beca</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*autoridad_rector*</span><span> => Nombre completo y C.I. del Rector</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*autoridad_admin*</span><span> => Nombre completo y C.I. del Director Admin.</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*autoridad_dube*</span><span> => Nombre completo y C.I. del Director de la DUBE</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*univ_becario*</span><span> => Nombre completo y C.I. del Becario</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*nombre_rector*</span><span> => Nombre del Rector</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*cargo_rector*</span><span> => Cargo del Rector</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*nombre_admin*</span><span> => Nombre Director Admin. F.</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*cargo_admin*</span><span> => Cargo del Director Admin. F.</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*nombre_dube*</span><span> => Nombre del Director de la DUBE</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*cargo_dube*</span><span> => Cargo del Director de la Dube</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*nombre_becario*</span><span> => Nombre completo del becario</span>
                    </div>
                    <div class="col-md-4">
                        <span class="text-red">*ci_univ*</span><span> => C.I. del Becario</span>
                    </div>
                    <div class="col-md-12">
                        <label for="modeloc_parte1" class="control-label">Modelo Contrato</label>
                        <div class="form-group">
                            <div id="modeloc_parte1"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte1');?></span>
                        </div>
                    </div>
                    <div class="col-md-12" id="elmodelo" style="display: none">
                        <label for="modeloc_parte2" class="control-label">Modelo Compromiso</label>
                        <div class="form-group">
                            <div id="modeloc_parte2"></div>
                            <span class="text-danger"><?php echo form_error('modeloc_parte2');?></span>
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