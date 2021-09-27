function guardar_contrato(){
    var base_url      = document.getElementById('base_url').value;
    var postulante_id = document.getElementById('postulante_id').value;
    var para_guardar = document.getElementById('para_guardar').value;
    var controlador = base_url+'contrato/registrar_contrato';
    $.ajax({url: controlador,
            type:"POST",
            data:{postulante_id:postulante_id, para_guardar:para_guardar
            },
            success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    //alert("mmmm");
                    window.location.href = base_url+"postulante";
            }
        },
        error:function(respuesta){
            //alert("QQQS");
           window.location.href = base_url+"postulante";
        }
    });
}
/* guardar compromiso */
function guardar_compromiso(){
    var base_url      = document.getElementById('base_url').value;
    var postulante_id = document.getElementById('postulante_id').value;
    var para_guardar = document.getElementById('para_guardar').value;
    var controlador = base_url+'compromiso/registrar_compromiso';
    $.ajax({url: controlador,
            type:"POST",
            data:{postulante_id:postulante_id, para_guardar:para_guardar
            },
            success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    //alert("mmmm");
                    window.location.href = base_url+"postulante";
            }
        },
        error:function(respuesta){
            //alert("QQQS");
            window.location.href = base_url+"postulante";
        }
    });
}