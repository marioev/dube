function buscar_becas(){
    var base_url    = document.getElementById('base_url').value;
    var convocatoria_id = document.getElementById('convocatoria_id').value;
    var controlador = base_url+"convocatoria/get_becas_deconvocatoria";
    $.ajax({url: controlador,
            type:"POST",
            data:{convocatoria_id:convocatoria_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var n = datos.length;
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td align='center' style='width:5px;'>"+(i+1)+"</td>";
                        html += "<td> "+datos[i].convocatoria_descripcion+" </td>";
                        html += "<td> "+datos[i].beca_nombre+" </td>";
                        html += "<td> "+datos[i].gestion_descripcion+" </td>";
                        html += "<td class='text-center'> "+datos[i].plaza_cantidad+" </td>";
                        html += "<td class='text-center'> "+datos[i].estado_descripcion+" </td>";
                        html += "<td>";
                        html += "<a href='"+base_url+"convocatoria/modif_requisito/"+convocatoria_id+"/"+datos[i]["beca_id"]+"' target='_blank' class='btn btn-facebook btn-xs' title='Modificar Requisitos'><span class='fa fa-list-ul'></span></a>";
                        html += "</td>";
                        html += "</tr>";
                    }
                   $("#mostrarbecas").html(html);
                   //$('#modalrequisito').modal('show');
                }else{
                    alert("Esta convocatoria no tiene Requisitos");
                }
        }
    })
}
