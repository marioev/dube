$(document).on("ready",inicio);
function inicio(){
    var gestion_id = document.getElementById('gestion_id').value;
    mostrar_convocatoria(gestion_id)
    buscar_comision();
}
function buscarlacomision(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        buscar_comision();
    }
}
function buscar_comision(){
    var base_url = document.getElementById('base_url').value;
    var filtrar  = document.getElementById('filtrar').value;
    var gestion_id = document.getElementById('gestion_id').value;
    var convocatoria_id = document.getElementById('convocatoria_id').value;
    var controlador = base_url+"comision/get_comisiones";
    $.ajax({url: controlador,
            type:"POST",
            data:{filtrar:filtrar, gestion_id:gestion_id, convocatoria_id:convocatoria_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    $("#numcomisiones").html(n);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr style='background:"+datos[i].estado_color+" '>";
                        html += "<td align='center' style='width:5px;'>"+(i+1)+"</td>";
                        html += "<td> "+datos[i].comision_nombre+" </td>";
                        html += "<td> "+datos[i].gestion_descripcion+" </td>";
                        html += "<td> "+datos[i].convocatoria_titulo+" </td>";
                        html += "<td> <span id='admin"+datos[i].comision_id+"'></span></td>";
                        html += "<td> "+datos[i].comision_descripcion+" </td>";
                        html += "<td class='text-center'> "+moment(datos[i].comision_fechacreacion).format("DD/MM/YYYY")+" </td>";
                        html += "<td class='text-center'> "+datos[i].estado_descripcion+" </td>";
                        html += "<td> ";
                        html += "<a href='"+base_url+"comision/edit/"+datos[i].comision_id+"' class='btn btn-info btn-xs' title='Modificar comision'><span class='fa fa-pencil'></span></a>";
                        html += " </td>";
                        html += "</tr>";
                        buscar_administrativo(datos[i].comision_id);
                    }
                   $("#tablacomision").html(html);
                   //$('#modalrequisito').modal('show');
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
                }
        }
    })
}
/* busca administrativos que pertenecen a una comisión */
function buscar_administrativo(comision_id){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"comision_administrativo/get_administrativos";
    $.ajax({url: controlador,
            type:"POST",
            data:{comision_id:comision_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    html = "";
                    html += "<table style='font-size: 10px'>";
                    html += "<tr>";
                    html += "<th style='padding: 0'>Administrativo</th>";
                    html += "<th style='padding: 0'>Cargo</th>";
                    html += "<th style='padding: 0'>Cargo Comision</th>";
                    html += "<th style='padding: 0'></th>";
                    html += "</tr>";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td style='padding: 0'>";
                        html += "-"+datos[i].admin_apellido+" "+datos[i].admin_nombre;
                        html += "</td>";
                        html += "<td style='padding: 0'>";
                        html += datos[i].cargo_nombre;
                        html += "</td>";
                        html += "<td style='padding: 0'>";
                        if(datos[i].cargocomision_id >0){
                            html += datos[i].cargocomision_descripcion;
                        }
                        html += "</td>";
                        html += "<td style='padding: 0'>";
                        if(datos[i].cargocomision_id >0){
                            html += "<a onclick='mostrar_modalcargoc("+datos[i].comisionadmin_id+", "+datos[i].cargocomision_id+")' class='btn btn-facebook btn-xs' title='Modificar cargo comisión'><i class='fa fa-list-ol'></i></a>";
                        }else{
                            html += "<a onclick='mostrar_modalcargoc("+datos[i].comisionadmin_id+", 0)' class='btn btn-facebook btn-xs' title='Añadir cargo comisión'><i class='fa fa-list-ol'></i></a>";
                        }
                        html += "</td>";
                        html += "</tr>";
                    }
                    html += "</table>";
                   $("#admin"+comision_id).html(html);
                }else{
                    alert("Esta comisión no tiene Administrativos");
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
                    html += "<select name='convocatoria_id' class='btn-primary btn-sm btn-block form-control' id='convocatoria_id' >";
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

/* mostrar modal cargo comision */
function mostrar_modalcargoc(comisionadmin_id, cargocomision_id){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"cargo_comision/get_cargo_comision";
    $.ajax({url: controlador,
            type:"POST",
            data:{},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    var selected = "";
                    $("#lacomisionadmin_id").val("");
                    $("#tablacargo").html("");
                    html = "";
                    html += "<select class='form-control' name='elcargo' id='elcargo' required>";
                    for (var i = 0; i < n ; i++){
                        if(cargocomision_id >0){
                            if(datos[i].cargocomision_id == cargocomision_id){
                                selected = "selected";
                            }else{ selected = ""; }
                        }
                        html += "<option value='"+datos[i].cargocomision_id+"' "+selected+">"+datos[i].cargocomision_descripcion+"</option>";
                    }
                    html += "</select>";
                    $("#lacomisionadmin_id").val(comisionadmin_id);
                    $("#tablacargo").html(html);
                    $('#modal_cargocomision').modal('show');
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
                }
        }
    })
}

/* registrar cargo comision en comision administrativo */
function registrarcargocomision(){
    var base_url    = document.getElementById('base_url').value;
    var cargocomision_id = document.getElementById('elcargo').value;
    var comisionadmin_id = document.getElementById('lacomisionadmin_id').value;
    $('#modal_cargocomision').modal('hide');
    var controlador = base_url+"cargo_comision/registrar_cargo_comision";
    $.ajax({url: controlador,
            type:"POST",
            data:{comisionadmin_id:comisionadmin_id, cargocomision_id:cargocomision_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    buscar_comision();
                    /*var n = datos.length;
                    var required = "";
                    $("#lacomisionadmin_id").val("");
                    $("#tablacargo").html("");
                    html = "";
                    html += "<select class='form-control' name='elcargo' id='elcargo' required>";
                    for (var i = 0; i < n ; i++){
                        if(cargocomision_id >0){
                            if(datos[i].cargocomision_id == cargocomision_id){
                                required = "required";
                            }else{ required = ""; }
                        }
                        html += "<option value='"+datos[i].cargocomision_id+"' "+required+">"+datos[i].cargocomision_descripcion+"</option>";
                    }
                    html += "</select>";
                    $("#lacomisionadmin_id").val(comisionadmin_id);
                    $("#tablacargo").html(html);
                    $('#modal_cargocomision').modal('show');*/
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
                }
        }
    })
}