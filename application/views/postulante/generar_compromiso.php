<script src="<?php echo base_url('resources/js/contrato.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<style type="text/css">
    table{
        /*width : 7cm;*/
        margin : 0 0 0px 0;
        padding : 0 0 0 0;
        border-spacing : 0 0;
        border-collapse : collapse;
        font-family: "Times New Roman";
        font-size: 12px;

        td {
        border:hidden;
        padding: 0;
        }
    }
    .identado{
        text-indent: 4em;
    }
    .identado1{
        text-indent: 1em;
    }
    .identado2{
        text-indent: 2em;
    }
    .identado3{
        text-indent: 3em;
    }
</style>
<?php
$margen  = "3cm";
$tamanio = "15cm";
?>
<div class="table-responsive">
<table class="table">
    <tr>
        <td style="width: <?php echo $margen; ?>" ></td>
        <td>
            <table class="table" style="width: <?php echo $tamanio;?>;">
                <tr>
                    <td>
                        <?php
                        $el_contrato =  $contrato['modeloc_parte2'];
                        $beca_nombre = $postulante['beca_nombre'];
                        $el_contrato = str_replace("*la_beca*", $beca_nombre, $el_contrato);
                        $ci = $postulante['estudiante_ci'];
                        if($ci != null && $ci != ""){ $ci = ", con C.I. ".$ci; }
                        $nombre_postulante = $postulante['estudiante_apellidos']." ".$postulante['estudiante_nombre'].$ci;
                        $elrector = $rector['autoridadc_nombre']." con C.I. ".$rector['autoridadc_ci'];
                        $el_contrato = str_replace("*autoridad_rector*", $elrector, $el_contrato);
                        $eladmin = $administrativo['autoridadc_nombre']." con C.I. ".$administrativo['autoridadc_ci'];
                        $el_contrato = str_replace("*autoridad_admin*", $eladmin, $el_contrato);
                        $ladube = $dube['autoridadc_nombre']." con C.I. ".$dube['autoridadc_ci'];
                        $el_contrato = str_replace("*autoridad_dube*", $ladube, $el_contrato);
                        /* *****inicio para firmar****** */
                        $nombre_becario = $postulante['estudiante_apellidos']." ".$postulante['estudiante_nombre'];
                        $el_contrato = str_replace("*nombre_univ*", $nombre_becario, $el_contrato);
                        $nombre_rector = $rector['autoridadc_nombre'];
                        $cargo_rector  = $rector['autoridadc_cargo'];
                        $el_contrato = str_replace("*nombre_rector*", $nombre_rector, $el_contrato);
                        $el_contrato = str_replace("*cargo_rector*", $cargo_rector, $el_contrato);
                        $nombre_admin = $administrativo['autoridadc_nombre'];
                        $cargo_admin  = $administrativo['autoridadc_cargo'];
                        $el_contrato = str_replace("*nombre_admin*", $nombre_admin, $el_contrato);
                        $el_contrato = str_replace("*cargo_admin*", $cargo_admin, $el_contrato);
                        $nombre_dube = $dube['autoridadc_nombre'];
                        $cargo_dube  = $dube['autoridadc_cargo'];
                        $el_contrato = str_replace("*nombre_dube*", $nombre_dube, $el_contrato);
                        $el_contrato = str_replace("*cargo_dube*", $cargo_dube, $el_contrato);
                        $elci = $postulante['estudiante_ci'];
                        $el_contrato = str_replace("*ci_univ*", $elci, $el_contrato);
                        
                        /* *****F I N  para firmar****** */
                        
                        $contrato_final = str_replace("*univ_becario*", $nombre_postulante, $el_contrato);
                        echo $contrato_final;
                        ?>
                        <textarea id="para_guardar" hidden><?php echo $contrato_final; ?></textarea>
                        <input type="hidden" id="postulante_id" value="<?php echo $postulante['postulante_id'] ?>">
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: <?php echo $margen; ?>" ></td>
    </tr>
</table>
</div>
<div class="no-print">
    <a onclick="guardar_compromiso()" class="btn btn-success"><i class="fa fa-check"></i> Guardar</a>
    <a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar</a>
</div>

