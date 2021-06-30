<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar Cargo Comisión</h3>
            </div>
            <?php echo form_open('cargo_comision/edit/'.$cargo_comision['cargocomision_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="cargocomision_descripcion" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="cargocomision_descripcion" value="<?php echo ($this->input->post('cargocomision_descripcion') ? $this->input->post('cargocomision_descripcion') : $cargo_comision['cargocomision_descripcion']); ?>" class="form-control" id="cargocomision_descripcion" required autofocus autocomplete="off" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            <span class="text-danger"><?php echo form_error('cargocomision_descripcion');?></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <label for="cargocomision_nivel" class="control-label"><span class="text-danger">*</span>Nivel</label>
                            <div class="form-group">
                                <select name="cargocomision_nivel" id="cargocomision_nivel" class="form-control" required>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 1){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="1" <?php echo $selected; ?>>1</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 2){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="2" <?php echo $selected; ?>>2</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 3){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="3" <?php echo $selected; ?>>3</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 4){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="4" <?php echo $selected; ?>>4</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 5){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="5" <?php echo $selected; ?>>5</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 6){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="6" <?php echo $selected; ?>>6</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 7){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="7" <?php echo $selected; ?>>7</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 8){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="8" <?php echo $selected; ?>>8</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 9){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="9" <?php echo $selected; ?>>9</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 10){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="10" <?php echo $selected; ?>>10</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 11){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="11" <?php echo $selected; ?>>11</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 12){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="12" <?php echo $selected; ?>>12</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 13){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="13" <?php echo $selected; ?>>13</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 14){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="14" <?php echo $selected; ?>>14</option>
                                    <?php if($cargo_comision['cargocomision_nivel'] == 15){ $selected = "selected"; }else{ $selected = ""; } ?>
                                    <option value="15" <?php echo $selected; ?>>15</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('cargo_comision'); ?>" class="btn btn-danger">
                    <i class="fa fa-times"></i> Cancelar</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>