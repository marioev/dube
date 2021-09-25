$(document).on("ready",inicio);
function inicio(){
    var elmodelo_contrato1 = document.getElementById("elmodelo_contrato1").value;
    $('#modeloc_parte1').summernote({
        height: 350,
    });
    $('#modeloc_parte1').summernote('code', elmodelo_contrato1);
}

function modificar_modelocontrato(modeloc_id){
    var base_url  = document.getElementById('base_url').value;
    var controlador = base_url+'modelo_contrato/modificar_modelocontrato';
    var beca_id   = document.getElementById('beca_id').value;
    var modeloc_parte1 = $('#modeloc_parte1').summernote('code');
    $.ajax({url: controlador,
            type:"POST",
            data:{modeloc_id:modeloc_id, beca_id:beca_id, modeloc_parte1:modeloc_parte1
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