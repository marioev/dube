$(document).on("ready",inicio);
function inicio(){
    var gestion_id  = document.getElementById('gestion_id').value;
    mostrar_convocatoria(gestion_id);
}
/* muestra las convocatorias de una gestion */
function mostrar_convocatoria(gestion_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'convocatoria/obtener_convocatorias/';
    $.ajax({url: controlador,
           type:"POST",
           data:{gestion_id:gestion_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    html = "";
                    html += "<select name='convocatoria_id' class='form-control' id='convocatoria_id' required >";
                    html += "<option value='' selected>Seleccione una convocatoria</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<option value='"+registros[i]["convocatoria_id"]+"'>";
                        html += registros[i]["convocatoria_titulo"];
                        html += "</option>";
                    }
                    html += "</select>";
                    //$("#subcategoria_id").append(html);
                    $("#convocatoria_id").replaceWith(html);
            }
        },
        error:function(respuesta){
           html = "";
           //$("#producto_nombreenvase").html(html);
        }
    });   
}

function aniadir(){
    $("#admin_pasar option:selected").each(function() {
        $('#admin_quitar').append($('<option>', {
            value: $(this).val(),
            text : $(this).text()
        }));
        $(this).remove();
        seleccionar();
    });
}

function quitar(){
    $("#admin_quitar option:selected").each(function() {
        $('#admin_pasar').append($('<option>', {
            value: $(this).val(),
            text : $(this).text()
        }));
        $(this).remove();
    });
}

function seleccionar(){
    $("#admin_quitar option").each(function(){
        $("#admin_quitar option[value="+this.value+"]").prop("selected",true);
    });
}
