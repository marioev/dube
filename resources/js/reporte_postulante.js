function buscar_postulantes(){
    var base_url   = document.getElementById('base_url').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var convocatoria_id = document.getElementById('convocatoria_id').value;
    var estado_id  = document.getElementById('estado_id').value;
    var controlador = base_url+"reporte/buscar_postulante";
    $.ajax({url: controlador,
            type:"POST",
            data:{gestion_id:gestion_id, convocatoria_id:convocatoria_id, estado_id:estado_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var nom_gestion = $("#gestion_id option:selected").text();
                    var nom_convoc  = $("#convocatoria_id option:selected").text();
                    var nom_estado  = $("#estado_id option:selected").text();
                    var n = datos.length;
                    //var total = Number(0);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        //total += Number(datos[i].solicitud_cantidad_becarios);
                        html += "<tr style='background: "+datos[i].estado_color+"'>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px; width:5px;' align='center'>"+(i+1)+"</td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;'> "+datos[i].estudiante_apellidos+" "+datos[i].estudiante_nombre+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;' class='text-right'> "+datos[i].estudiante_telefono+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;' class='text-right'> "+datos[i].estudiante_celular+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;' class='text-right'> "+datos[i].estudiante_email+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;' class='text-right'> "+datos[i].postulante_observacion+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px;' class='text-right'> "+datos[i].estado_descripcion+" </td>";
                        html += "</tr>";
                    }
                    /*html += "<tr>";
                    html += "<td colspan='2' class='text-right text-bold'> Total: </td>";
                    html += "<td class='text-right text-bold'> "+total+" </td>";
                    html += "</tr>";
                    */
                   $("#mostrarpostulantes").html(html);
                   $("#lagestion").html("Gestion: <b>"+nom_gestion+"</b><br>");
                   $("#laconvocatoria").html("Convocatoria: <b>"+nom_convoc+"</b><br>");
                   $("#elestado").html("Estado: <b>"+nom_estado+"</b>");
                }else{
                    $("#mostrarpostulantes").html("");
                    alert("No se encontraron Solicitudes");
                }
        }
    })
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
                    html += "<select name='convocatoria_id' class='btn-primary btn-sm btn-block form-control' id='convocatoria_id'>";
                    html += "<option value='0' selected>-TODAS-</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<option value='"+registros[i]["convocatoria_id"]+"'>";
                        html += registros[i]["convocatoria_descripcion"];
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

function imprimir_postulantes(){
    window.print();
}
