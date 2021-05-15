<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="estepostulante" id="estepostulante" value='<?php echo json_encode($postulante); ?>' />
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $postulante['estudiante_apellidos']." ".$postulante['estudiante_nombre']; ?></h3>
            </div>
            <?php echo form_open('postulante/solunidad/'.$postulante['postulante_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        <!--<div class="col-md-5">
                            <label for="estudiante_id" class="control-label">Estudiante</label>
                            <div class="form-group">
                                <select name="estudiante_id" class="form-control">
                                    <?php 
                                    /*foreach($all_estudiante as $estudiante)
                                    {
                                        $selected = ($estudiante['estudiante_id'] == $postulante['estudiante_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estudiante['estudiante_id'].'" '.$selected.'>'.$estudiante['estudiante_apellidos']." ".$estudiante['estudiante_nombre'].'</option>';
                                    }*/
                                    ?>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-md-4">
                            <label for="gestion_id" class="control-label">Gestión:</label>
                            <span><?php echo $postulante['gestion_descripcion']; ?></span>
                        </div>
                        <div class="col-md-6">
                            <label for="convocatoria_id" class="control-label">Convocatoria:</label>
                            <span><?php echo $postulante['convocatoria_descripcion']; ?></span>
                        </div>
                        <!--<div class="col-md-5">
                            <label for="plaza_id" class="control-label">Seleccionar Tipo de Beca</label>
                            <div class="form-group">
                                <select name="plaza_id" class="form-control" id="plaza_id" required>
                                    <?php 
                                    /*foreach($all_plazas_becas as $plazas_beca)
                                    {
                                        $selected = ($plazas_beca['plaza_id'] == $this->input->post('plaza_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$plazas_beca['plaza_id'].'" '.$selected.'>'.$plazas_beca['beca_nombre'].'</option>';
                                    }*/
                                    ?>
                                </select>
                            </div>
                        </div>-->
                        <div class="col-md-7">
                            <label for="solicitud_id" class="control-label">Seleccionar Unidad Solicitante</label>
                            <div class="form-group">
                                <select name="solicitud_id" class="form-control" id="solicitud_id" required>
                                    <?php 
                                    foreach($all_solicitud_unidad as $solicitud_unidad)
                                    {
                                        //$selected = ($plazas_beca['plaza_id'] == $this->input->post('plaza_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$solicitud_unidad['solicitud_id'].'" '.$selected.'>'.$solicitud_unidad['solicitud_unidad'].', '.$solicitud_unidad['solicitud_modalidad'].', '.$solicitud_unidad['unidad_responsable'].', Becas disponibles: '.$solicitud_unidad['cantidad_disponible'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="solunidad_inicio" class="control-label">Fecha de Inicio</label>
                            <div class="form-group">
                                <input type="date" name="solunidad_inicio" value="<?php echo date("Y-m-d"); ?>" class="form-control" id="solunidad_inicio"/>
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