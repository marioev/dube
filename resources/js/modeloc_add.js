$(document).on("ready",inicio);
function inicio(){
    $('#modeloc_parte1').summernote({
        height: 350,
    });
    $('#modeloc_parte2').summernote({
        height: 350,
    });
}

function registrar_modelocontrato(){
    var base_url  = document.getElementById('base_url').value;
    var controlador = base_url+'modelo_contrato/registrar_modelocontrato';
    var beca_id   = document.getElementById('beca_id').value;
    var modeloc_parte1 = $('#modeloc_parte1').summernote('code');
    var modeloc_parte2 = $('#modeloc_parte2').summernote('code');
    $.ajax({url: controlador,
            type:"POST",
            data:{beca_id:beca_id, modeloc_parte1:modeloc_parte1, modeloc_parte2:modeloc_parte2
            },
            success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    window.location.href = base_url+"modelo_contrato";
            }
        },
        error:function(respuesta){
           window.location.href = base_url+"modelo_contrato";
        }
    });
}
/* mostrar el campo modelo compromiso */
function mostrar_compromiso(){
    var beca_id = document.getElementById('beca_id').value;
    if(beca_id == "5"){ //5 = beca deporte
        $("#elmodelo").css("display", "block");
    }else{
        $("#elmodelo").css("display", "none");
    }
}
