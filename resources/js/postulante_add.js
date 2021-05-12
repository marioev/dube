$(document).on("ready",inicio);
function inicio(){
    var gestion_id  = document.getElementById('gestion_id').value;
    mostrar_convocatoria(gestion_id);
}
function registrarnuevoestudiante(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var estudiante_nombre = document.getElementById('estudiante_nombre').value;
    var estudiante_apellidos = document.getElementById('estudiante_apellidos').value;
    var estudiante_ci = document.getElementById('estudiante_ci').value;
    var estudiante_codsis = document.getElementById('estudiante_codsis').value;
    var estudiante_email = document.getElementById('estudiante_email').value;
    var estudiante_carrera = document.getElementById('estudiante_carrera').value;
    var estudiante_celular = document.getElementById('estudiante_celular').value;
    var estudiante_telefono = document.getElementById('estudiante_telefono').value;
    var mensaje = "";
    if(estudiante_nombre =="" || estudiante_apellidos == ""){
        mensaje += "Nombres y Apellidos no deben estar en blanco";
    }
    if(estudiante_ci ==""){
        mensaje += ", C.I. no debe estar en blanco";
    }
    if(estudiante_codsis ==""){
        mensaje += ", Codigo SIS no debe estar en blanco";
    }
    if(estudiante_email ==""){
        mensaje += ", Correo Electronico no debe estar en blanco";
    }
    if(estudiante_carrera ==""){
        mensaje += ", Carrera no debe estar en blanco";
    }
    
    if(mensaje != ""){
        alert(mensaje);
    }else{
        controlador = base_url+'postulante/nuevoestudiante/';
        $('#modalestudiante').modal('hide');
        $.ajax({url: controlador,
                type:"POST",
                data:{estudiante_nombre:estudiante_nombre, estudiante_apellidos:estudiante_apellidos,
                     estudiante_ci:estudiante_ci, estudiante_codsis:estudiante_codsis,
                     estudiante_email:estudiante_email, estudiante_carrera:estudiante_carrera,
                     estudiante_celular:estudiante_celular, estudiante_telefono:estudiante_telefono
                },
                success:function(respuesta){
                    var registros =  JSON.parse(respuesta);
                    if (registros != null){
                        html = "";
                        html += "<option value='"+registros["estudiante_id"]+"' selected >";
                        html += registros["estudiante_apellidos"]+" "+registros["estudiante_nombre"];
                        html += "</option>";
                        $("#estudiante_id").append(html);
                }
            },
            error:function(respuesta){
               html = "";
               $("#estudiante_id").html(html);
            }

        });
    }
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
                    html += "<select name='convocatoria_id' class='form-control' id='convocatoria_id' required onchange='mostrar_beca(this.value)'>";
                    html += "<option value='' selected>Seleccione una convocatoria</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<option value='"+registros[i]["convocatoria_id"]+"'>";
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
    controlador = base_url+'convocatoria/obtener_becas/';
    $.ajax({url: controlador,
           type:"POST",
           data:{convocatoria_id:convocatoria_id},
           success:function(respuesta){
                var registros =  JSON.parse(respuesta);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    html = "";
                    html += "<select name='plaza_id' class='form-control' id='plaza_id' required>";
                    html += "<option value='' selected>Elegir tipo de beca</option>";
                    for (var i = 0; i < n ; i++){
                        html += "<option value='"+registros[i]["plaza_id"]+"'>";
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
