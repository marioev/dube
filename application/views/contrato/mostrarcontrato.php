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
                        <?php echo $contrato['contrato_contrato']; ?>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: <?php echo $margen; ?>" ></td>
    </tr>
</table>
</div>
<div class="no-print">
    <a href="<?php echo site_url('postulante'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar</a>
</div>

