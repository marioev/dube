<body onload="mostrar_grafica()">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />  
    <!-- Main content -->
    <section>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner" >
                        <h3><b><i class="fa fa-graduation-cap" aria-hidden="true"></i></b></h3>
                        <div>
                            <h5 width="100%"><b>BECAS PUBLICADAS</b></h5>
                        </div>                  
                    </div>
                    <div class="icon">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>              
                    </div>
                    <a href="<?php echo base_url('beca/index'); ?>" class="small-box-footer"> cant - <?= $cant_beca['cant_beca']; ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner" >
                        <h3><b><i class="fa fa-university" aria-hidden="true"></i></b></h3>
                        <div>
                            <h5 width="100%"><b>UNIDADES</b></h5>
                        </div>
                    </div>
                    
                    <div class="icon">
                    <i class="fa fa-university" aria-hidden="true"></i>             
                    </div>
                    <a href="<?php echo base_url('unidad/index'); ?>" class="small-box-footer">cant. - <?= $cant_unidad['cant_unidad']; ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner" >
                        <h3><b><i class="fa fa-users" aria-hidden="true"></i></b></h3>
                        <div>
                            <h5 width="100%"><b>POSTULANTES</b></h5>
                        </div>
                    </div>
                    
                    <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <a href="<?= base_url('postulante/index') ?>" class="small-box-footer">cant. - <?= $cant_postulante['cant_postulante'] ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner" >
                        <h3><b><i class="fa fa-newspaper-o" aria-hidden="true"></i></b></h3>
                        <h5><b>PUBLICACIONES ACTIVAS</b></h5>
                    </div>
                    
                    <div class="icon">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    </div>
                    
                    <a href="<?= base_url('publicacion/index'); ?>" class="small-box-footer">cant. - <?= $cant_publicacion['cant_publicacion'] ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>    
    
    <script> 
        var user_id = '<?php echo $user_id?>'; 
        var tipouser_id = '<?= $tipousuario_id ?>';
        console.log(tipouser_id);
    </script>
</body>   