function buscar_administrativos(){
    var base_url   = document.getElementById('base_url').value;
    var cargo_id = document.getElementById('cargo_id').value;
    var controlador = base_url+"reporte/buscar_administrativo";
    $.ajax({url: controlador,
            type:"POST",
            data:{cargo_id:cargo_id},
            success:function(respuesta){
                var datos= JSON.parse(respuesta);
                if (datos != null){
                    var nom_cargo = $("#cargo_id option:selected").text();
                    var n = datos.length;
                    //var total = Number(0);
                    html = "";
                    for (var i = 0; i < n ; i++){
                        //total += Number(datos[i].solicitud_cantidad_becarios);
                        html += "<tr style='background: "+datos[i].estado_color+"'>";
                        html += "<td align='center' style='width:5px;'>"+(i+1)+"</td>";
                        html += "<td> "+datos[i].admin_apellido+" "+datos[i].admin_nombre+" </td>";
                        html += "<td class='text-right'> "+datos[i].admin_cargo+" </td>";
                        html += "<td class='text-right'> "+datos[i].admin_telefono+" </td>";
                        html += "<td class='text-right'> "+datos[i].admin_celular+" </td>";
                        html += "<td class='text-right'> "+datos[i].admin_email+" </td>";
                        html += "<td class='text-right'> "+datos[i].estado_descripcion+" </td>";
                        html += "</tr>";
                    }
                    /*html += "<tr>";
                    html += "<td colspan='2' class='text-right text-bold'> Total: </td>";
                    html += "<td class='text-right text-bold'> "+total+" </td>";
                    html += "</tr>";
                    */
                   $("#mostraradministrativos").html(html);
                   $("#elcargo").html("Cargo: <b>"+nom_cargo+"</b><br>");
                }else{
                    $("#mostraradministrativos").html("");
                    alert("No se encontraron Solicitudes");
                }
        }
    })
}

function imprimir_administrativos(){
    window.print();
}
