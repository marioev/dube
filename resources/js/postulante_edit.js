$(document).on("ready",inicio);
function inicio(){
    var gestion_id  = document.getElementById('gestion_id').value;
    mostrar_convocatoria(gestion_id);
}

/* muestra las convocatorias de una gestion */
function mostrar_convocatoria(gestion_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var estepostulante = JSON.parse(document.getElementById('estepostulante').value);
    controlador = base_url+'convocatoria/obtener_convocatorias/';
    $.ajax({url: controlador,
           type:"POST",
           data:{gestion_id:gestion_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var selected  = "";
                    html = "";
                    html += "<select name='convocatoria_id' class='form-control' id='convocatoria_id' required onchange='mostrar_beca(this.value)'>";
                    html += "<option value=''>Seleccione una convocatoria</option>";
                    for (var i = 0; i < n ; i++){
                        if(registros[i]["convocatoria_id"] == estepostulante['convocatoria_id']){
                            selected = "selected='selected'";
                            mostrar_beca(estepostulante['convocatoria_id']);
                        }else{ selected = ""; }
                        html += "<option value='"+registros[i]["convocatoria_id"]+"' "+selected+">";
                        html += registros[i]["convocatoria_descripcion"];
                        html += "</option>";
                    }
                    html += "</select>";
                    //$("#subcategoria_id").append(html);
                    $("#convocatoria_id").replaceWith(html);
                    html1 = "";
                    html1 += "<select name='plaza_id' class='form-control' id='plaza_id' required >";
                    html1 += "<option value=''>Elegir tipo de beca</option>";
                    html1 += "</select>";
                    $("#plaza_id").replaceWith(html1);
            }
        },
        error:function(respuesta){
           html = "";
           //$("#producto_nombreenvase").html(html);
        }
    });   
}
/* muestra las becas de una convocatoria */
function mostrar_beca(convocatoria_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var estepostulante = JSON.parse(document.getElementById('estepostulante').value);
    controlador = base_url+'convocatoria/obtener_becas/';
    $.ajax({url: controlador,
           type:"POST",
           data:{convocatoria_id:convocatoria_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var selected = "";
                    html = "";
                    html += "<select name='plaza_id' class='form-control' id='plaza_id' required>";
                    html += "<option value='' selected>Elegir tipo de beca</option>";
                    for (var i = 0; i < n ; i++){
                        if(registros[i]["plaza_id"] == estepostulante['plaza_id']){
                            selected = "selected='selected'";
                        }else{ selected = ""; }
                        html += "<option value='"+registros[i]["plaza_id"]+"' "+selected+">";
                        html += registros[i]["beca_nombre"];
                        html += "</option>";
                    }
                    html += "</select>";
                    //$("#subcategoria_id").append(html);
                    $("#plaza_id").replaceWith(html);
            }
        },
        error:function(respuesta){
           html = "";
           //$("#producto_nombreenvase").html(html);
        }
    });   
}
