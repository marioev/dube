$(document).on("ready",inicio);
function inicio(){
    $('#modeloc_parte1').summernote({
        height: 150,
    });
    $('#modeloc_parte2').summernote({
        height: 150,
    });
    $('#modeloc_parte3').summernote({
        height: 150,
    });
    $('#modeloc_parte4').summernote({
        height: 150,
    });
    $('#modeloc_parte5').summernote({
        height: 150,
    });
    $('#modeloc_parte6').summernote({
        height: 150,
    });
    $('#modeloc_parte7').summernote({
        height: 150,
    });
    $('#modeloc_parte8').summernote({
        height: 150,
    });
    $('#modeloc_parte9').summernote({
        height: 150,
    });
    $('#modeloc_parte10').summernote({
        height: 150,
    });
    $('#modeloc_parte11').summernote({
        height: 150,
    });
}

function registrar_modelocontrato(){
    var base_url  = document.getElementById('base_url').value;
    var controlador = base_url+'modelo_contrato/registrar_modelocontrato';
    var beca_id   = document.getElementById('beca_id').value;
    var modeloc_parte1 = $('#modeloc_parte1').summernote('code');
    var modeloc_parte2 = $('#modeloc_parte2').summernote('code');
    var modeloc_parte3 = $('#modeloc_parte3').summernote('code');
    var modeloc_parte4 = $('#modeloc_parte4').summernote('code');
    var modeloc_parte5 = $('#modeloc_parte5').summernote('code');
    var modeloc_parte6 = $('#modeloc_parte6').summernote('code');
    var modeloc_parte7 = $('#modeloc_parte7').summernote('code');
    var modeloc_parte8 = $('#modeloc_parte8').summernote('code');
    var modeloc_parte9 = $('#modeloc_parte9').summernote('code');
    var modeloc_parte10 = $('#modeloc_parte10').summernote('code');
    var modeloc_parte11 = $('#modeloc_parte11').summernote('code');
    $.ajax({url: controlador,
            type:"POST",
            data:{beca_id:beca_id, modeloc_parte1:modeloc_parte1, modeloc_parte2:modeloc_parte2,
                 modeloc_parte3:modeloc_parte3, modeloc_parte4:modeloc_parte4,
                 modeloc_parte5:modeloc_parte5, modeloc_parte6:modeloc_parte6,
                 modeloc_parte7:modeloc_parte7, modeloc_parte8:modeloc_parte8,
                 modeloc_parte9:modeloc_parte9, modeloc_parte10:modeloc_parte10,
                 modeloc_parte11:modeloc_parte11
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