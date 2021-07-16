$(document).on("ready",inicio);
function inicio(){
    var gestion_id = document.getElementById('gestion_id').value;
    mostrar_convocatoria(gestion_id)
    buscar_apostulantes();
}
function buscarelpostulante(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscar_apostulantes();
    }
}
function buscar_apostulantes(){
    var base_url = document.getElementById('base_url').value;
    var filtrar  = document.getElementById('filtrar').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var convocatoria_id = document.getElementById('convocatoria_id').value;
    var beca_id = document.getElementById('beca_id').value;
    var estado_id  = document.getElementById('estado_id').value;
    var ver_requisitos = document.getElementById('ver_requisitos').value;
    var controlador = base_url+"postulante/get_postulantes";
    $.ajax({url: controlador,
            type:"POST",
            data:{filtrar:filtrar, gestion_id:gestion_id, convocatoria_id:convocatoria_id, beca_id:beca_id, estado_id:estado_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    $("#numpostulantes").html(n);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr style='background:"+datos[i].estado_color+" '>";
                        html += "<td align='center' style='width:5px;'>"+(i+1)+"</td>";
                        html += "<td> "+datos[i].estudiante_apellidos+" "+datos[i].estudiante_nombre+" </td>";
                        html += "<td> "+datos[i].estudiante_carrera+" </td>";
                        html += "<td> "+datos[i].gestion_descripcion+" </td>";
                        html += "<td> "+datos[i].convocatoria_titulo+" </td>";
                        html += "<td> "+datos[i].beca_nombre+" </td>";
                        html += "<td> "+datos[i].padres_tutores+" </td>";
                        html += "<td> "+datos[i].postulante_observacion+" </td>";
                        html += "<td> "+datos[i].postulante_correccion+" </td>";
                        html += "<td class='text-center'> "+datos[i].estado_descripcion+" </td>";
                        html += "<td> ";
                        html += "<a href='"+base_url+"postulante/edit/"+datos[i].postulante_id+"' class='btn btn-info btn-xs' title='Modificar postulante'><span class='fa fa-pencil'></span></a>";
                        html += "<a href='"+base_url+"postulante/imprimir/"+datos[i].postulante_id+"' class='btn btn-success btn-xs' title='Imprimir requisitos del postulante'><span class='fa fa-print'></span></a>";
                        /*if(datos[i].estado_id == 3){
                        html += "<a href='"+base_url+"postulante/cumplir/"+datos[i].postulante_id+"' class='btn btn-success btn-xs' title='Calificar requisitos'><i class='fa fa-file-text-o'></i></a>";
                        }else*/ if(datos[i].estado_id == 5){
                            html += "<a href='"+base_url+"seguimiento/seguimiento/"+datos[i].postulante_id+"' class='btn btn-xs' title='Seguimiento a postulante' style='background: #8accdb' ><i class='fa fa-binoculars'></i></a>";
                            if(datos[i].beca_id == 9){
                                if(datos[i].solunidad_id != 'undefined' && datos[i].solunidad_id >0){
                        html += "<a href='"+base_url+"postulante/modif_solunidad/"+datos[i].solunidad_id+"' class='btn btn-warning btn-xs' title='Modificar unidad solicitante'><i class='fa fa-briefcase'></i></a>";
                                }
                                else{
                        html += "<a href='"+base_url+"postulante/solunidad/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Elegir unidad solicitante'><i class='fa fa-briefcase'></i></a>";
                                }
                            }else if(datos[i].beca_id == 1){
                        html += "<a href='"+base_url+"postulante/contratointernadorot/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else if(datos[i].beca_id == 2){
                        html += "<a href='"+base_url+"postulante/contratoelabtesis/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else if(datos[i].beca_id == 3){
                        html += "<a href='"+base_url+"postulante/contratoproygrado/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else if(datos[i].beca_id == 4){
                        html += "<a href='"+base_url+"postulante/contratoadscripcion/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else if(datos[i].beca_id == 5){
                        html += "<a href='"+base_url+"postulante/contratodeporte/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                        html += "<a href='"+base_url+"postulante/compromisopdeporte/"+datos[i].postulante_id+"' class='btn btn-soundcloud btn-xs' title='Compromiso de pago'><i class='fa fa-list'></i></a>";
                            }else /*if(datos[i].beca_id == 6){
                        html += "<a href='"+base_url+"postulante/contratocultura/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else*/ if(datos[i].beca_id == 7){
                        html += "<a href='"+base_url+"postulante/contratoextenuniv/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else /*if(datos[i].beca_id == 8){
                        html += "<a href='"+base_url+"postulante/contratovivalbergue/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }else*/ if(datos[i].beca_id == 10){
                        html += "<a href='"+base_url+"postulante/contratotrabdirigido/"+datos[i].postulante_id+"' class='btn btn-warning btn-xs' title='Generar contrato'><i class='fa fa-list'></i></a>";
                            }
                        }else if(datos[i].estado_id == 3 || datos[i].estado_id == 4 || datos[i].estado_id == 11){
                        html += "<a href='"+base_url+"postulante/modificar/"+datos[i].postulante_id+"' class='btn btn-soundcloud btn-xs' title='Modificar requisitos'><i class='fa fa-file-text-o'></i></a>";
                        }
                        if(ver_requisitos == 1){
                            html += "<a onclick='formulario_requisitos("+datos[i].postulante_id+")' class='btn btn-facebook btn-xs' title='Ver requisitos calificados'><i class='fa fa-list-ol'></i></a>";
                        }
                        html += " </td>";
                        html += "</tr>";
                    }
                   $("#tablapostulantes").html(html);
                   //$('#modalrequisito').modal('show');
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
                }
        }
    })
}
function formulario_requisitos(postulante_id){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"postulante/get_formulariorequisitos";
    $.ajax({url: controlador,
            type:"POST",
            data:{postulante_id:postulante_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td align='center' style='width:5px;'>"+(i+1)+"</td>";
                        html += "<td> "+datos[i].requisito_nombre+" </td>";
                        html += "<td> "+datos[i].formulario_observacion+" </td>";
                        html += "<td class='text-center'> ";
                        if(datos[i].estado_id == 7){
                            esteestado = "CUMPLE";
                        }else{
                            esteestado = "NO CUMPLE";
                        }
                        html += esteestado+" </td>";
                        html += "</tr>";
                    }
                   $("#tablaresultados").html(html);
                   $('#modalrequisito').modal('show');
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
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
                    html += "<select name='convocatoria_id' class='btn-primary btn-sm btn-block form-control' id='convocatoria_id' onchange='mostrar_beca(this.value)'>";
                    html += "<option value='0' selected>-TODAS-</option>";
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
/* muestra las becas de una convocatoria */
function mostrar_beca(convocatoria_id){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    controlador = base_url+'beca/obtener_becas/';
    $.ajax({url: controlador,
           type:"POST",
           data:{convocatoria_id:convocatoria_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    html = "";
                    html += "<select name='beca_id' class='btn-primary btn-sm btn-block form-control' id='beca_id'>";
                    html += "<option value='0' selected>-TODAS-</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<option value='"+registros[i]["beca_id"]+"'>";
                        html += registros[i]["beca_nombre"];
                        html += "</option>";
                    }
                    html += "</select>";
                    //$("#subcategoria_id").append(html);
                    $("#beca_id").replaceWith(html);
            }
        },
        error:function(respuesta){
           html = "";
           //$("#producto_nombreenvase").html(html);
        }
    });   
}