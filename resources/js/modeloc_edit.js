$(document).on("ready",inicio);
function inicio(){
    var elmodelo_contrato1 = document.getElementById("elmodelo_contrato1").value;
    var elmodelo_contrato2 = document.getElementById("elmodelo_contrato2").value;
    var elmodelo_contrato3 = document.getElementById("elmodelo_contrato3").value;
    var elmodelo_contrato4 = document.getElementById("elmodelo_contrato4").value;
    var elmodelo_contrato5 = document.getElementById("elmodelo_contrato5").value;
    var elmodelo_contrato6 = document.getElementById("elmodelo_contrato6").value;
    var elmodelo_contrato7 = document.getElementById("elmodelo_contrato7").value;
    var elmodelo_contrato8 = document.getElementById("elmodelo_contrato8").value;
    var elmodelo_contrato9 = document.getElementById("elmodelo_contrato9").value;
    var elmodelo_contrato10 = document.getElementById("elmodelo_contrato10").value;
    var elmodelo_contrato11 = document.getElementById("elmodelo_contrato11").value;
    
    $('#modeloc_parte1').summernote({
        height: 150,
    });
    $('#modeloc_parte1').summernote('code', elmodelo_contrato1);
    $('#modeloc_parte2').summernote({
        height: 150,
    });
    $('#modeloc_parte2').summernote('code', elmodelo_contrato2);
    $('#modeloc_parte3').summernote({
        height: 150,
    });
    $('#modeloc_parte3').summernote('code', elmodelo_contrato3);
    $('#modeloc_parte4').summernote({
        height: 150,
    });
    $('#modeloc_parte4').summernote('code', elmodelo_contrato4);
    $('#modeloc_parte5').summernote({
        height: 150,
    });
    $('#modeloc_parte5').summernote('code', elmodelo_contrato5);
    $('#modeloc_parte6').summernote({
        height: 150,
    });
    $('#modeloc_parte6').summernote('code', elmodelo_contrato6);
    $('#modeloc_parte7').summernote({
        height: 150,
    });
    $('#modeloc_parte7').summernote('code', elmodelo_contrato7);
    $('#modeloc_parte8').summernote({
        height: 150,
    });
    $('#modeloc_parte8').summernote('code', elmodelo_contrato8);
    $('#modeloc_parte9').summernote({
        height: 150,
    });
    $('#modeloc_parte9').summernote('code', elmodelo_contrato9);
    $('#modeloc_parte10').summernote({
        height: 150,
    });
    $('#modeloc_parte10').summernote('code', elmodelo_contrato10);
    $('#modeloc_parte11').summernote({
        height: 150,
    });
    $('#modeloc_parte11').summernote('code', elmodelo_contrato11);
}

function modificar_modelocontrato(modeloc_id){
    var base_url  = document.getElementById('base_url').value;
    var controlador = base_url+'modelo_contrato/modificar_modelocontrato';
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
            data:{modeloc_id:modeloc_id, beca_id:beca_id, modeloc_parte1:modeloc_parte1, modeloc_parte2:modeloc_parte2,
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