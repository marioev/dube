<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="estepostulante" id="estepostulante" value='<?php echo json_encode($postulante); ?>' />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $postulante['estudiante_apellidos']." ".$postulante['estudiante_nombre']; ?></h3>
            </div>
            <?php echo form_open('postulante/modif_solunidad/'.$esregistrado['solunidad_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="gestion_id" class="control-label">Gestión:</label>
                            <span><?php echo $postulante['gestion_descripcion']; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="convocatoria_id" class="control-label">Convocatoria:</label>
                            <span><?php echo $postulante['convocatoria_descripcion']; ?></span>
                        </div>
                        <div class="col-md-7">
                            <label for="solicitud_id" class="control-label">Seleccionar Unidad Solicitante</label>
                            <div class="form-group">
                                <select name="solicitud_id" class="form-control" id="solicitud_id" required>
                                    <?php 
                                    foreach($all_solicitud_unidad as $solicitud_unidad)
                                    {
                                        $selected = ($solicitud_unidad['solicitud_id'] == $esregistrado['solicitud_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$solicitud_unidad['solicitud_id'].'" '.$selected.'>'.$solicitud_unidad['solicitud_unidad'].', '.$solicitud_unidad['solicitud_modalidad'].', '.$solicitud_unidad['unidad_responsable'].', Becas disponibles: '.$solicitud_unidad['cantidad_disponible'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="solunidad_inicio" class="control-label">Fecha de Inicio</label>
                            <div class="form-group">
                                <input type="date" name="solunidad_inicio" value="<?php echo $esregistrado['solunidad_inicio']; ?>" class="form-control" id="solunidad_inicio"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="solunidad_fin" class="control-label">Fecha de Conclusión</label>
                            <div class="form-group">
                                <input type="date" name="solunidad_fin" value="<?php if($esregistrado['solunidad_fin'] == null || $esregistrado['solunidad_fin'] == "000-00-00" ){ echo date("Y-m-d"); }else{ echo ($this->input->post('solunidad_fin') ? $this->input->post('solunidad_fin') : $esregistrado['solunidad_fin']); } ?>" class="form-control" id="solunidad_fin"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <!--<option value="">select estado</option>-->
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $esregistrado['estado_id']) ? ' selected="selected"' : "";
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
                    <a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>