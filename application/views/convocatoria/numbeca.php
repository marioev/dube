<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
function toggle(source) {
  checkboxes = document.getElementsByClassName('checkbox');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Becas de la Convocatoria</h3>
              	<h3 class="box-title"><?php echo $convocatoria["convocatoria_descripcion"]; ?></h3>
            </div>
            <?php echo form_open('convocatoria/reg_numbeca/'.$convocatoria['convocatoria_id']); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <?php
                        foreach ($all_beca as $beca) {
                        ?>
                        <div class="col-md-4">
                            <label for="numbeca<?php echo $beca['plaza_id']; ?>" class="control-label"><span class="text-danger">*</span><?php echo $beca['beca_nombre']; ?></label>
                            <div class="form-group">
                                <input type="number" min="0" name="numbeca<?php echo $beca['plaza_id']; ?>" value="<?php echo ($this->input->post('plaza_cantidad') ? $this->input->post('plaza_cantidad') : $beca['plaza_cantidad']); ?>" class="form-control" id="numbeca<?php echo $beca['plaza_id']; ?>" required />
                                <span class="text-danger"><?php echo form_error('numbeca'.$beca['plaza_id']);?></span>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
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