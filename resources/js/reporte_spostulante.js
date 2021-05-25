function buscar_reporte(){
    var base_url   = document.getElementById('base_url').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var unidad_id  = document.getElementById('unidad_id').value;
    var controlador = base_url+"reporte/buscar_postulanteunidad";
    $.ajax({url: controlador,
            type:"POST",
            data:{gestion_id:gestion_id, unidad_id:unidad_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var nom_gestion = $("#gestion_id option:selected").text();
                    var nom_unidad  = $("#unidad_id option:selected").text();
                    var lospostulantes = 0;
                    var n = datos.length;
                    var total = Number(0);
                    var aceptados = Number(0);
                    var disponibles = Number(0);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        total += Number(datos[i].solicitud_cantidad_becarios);
                        aceptados += Number(datos[i].becarios_aceptados);
                        disponibles += Number(datos[i].cantidad_disponible);
                        html += "<tr>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px; width:5px;' align='center'>"+(i+1)+"</td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> ";
                        if(datos[i].estudiante_apellidos != null && datos[i].estudiante_apellidos != ""){
                            html += datos[i].estudiante_apellidos+" "+datos[i].estudiante_nombre;
                            lospostulantes ++;
                        }
                        html += "</td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> ";
                        if(datos[i].solunidad_inicio != null && datos[i].solunidad_inicio != "000-00-00"){
                            html += moment(datos[i].solunidad_inicio).format("DD/MM/YYYY");
                        }
                        html += "</td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> ";
                        if(datos[i].solunidad_fin != null && datos[i].solunidad_fin != "000-00-00"){
                            html += moment(datos[i].solunidad_fin).format("DD/MM/YYYY");
                        }
                        html += "</td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> "+datos[i].solicitud_unidad+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> "+datos[i].unidad_nombre+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> "+datos[i].solicitud_carreras_requiremiento+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> "+datos[i].solicitud_actividad+" </td>";
                        html += "<td style='padding-top: 0; padding-bottom: 0px'> "+datos[i].unidad_responsable+" </td>";
                        html += "</tr>";
                    }
                    /*html += "<tr>";
                    html += "<td colspan='5' class='text-right text-bold'> Total: </td>";
                    html += "<td class='text-right text-bold'> "+total+" </td>";
                    html += "<td class='text-right text-bold'> "+aceptados+" </td>";
                    html += "<td class='text-right text-bold'> "+disponibles+" </td>";
                    html += "</tr>";
                    */
                   $("#mostrarsolicitudes").html(html);
                   $("#lagestion").html("Gestion: <b>"+nom_gestion+"</b><br>");
                   $("#launidad").html("Unidad: <b>"+nom_unidad+"</b><br>");
                   $("#lospostulantes").html("Postulantes: <b>"+lospostulantes+"</b>");
                }else{
                    $("#mostrarsolicitudes").html("");
                    alert("No se encontraron Solicitudes");
                }
        }
    })
}
function imprimir_reporte(){
    window.print();
}
