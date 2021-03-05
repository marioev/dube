function mostrar_requisitos(convocatoria_id){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"convocatoria/get_requisitos";
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
                        html += "<td> "+datos[i].requisito_nombre+" </td>";
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

function numberFormat(numero){
    // Variable que contendra el resultado final
    var resultado = "";

    // Si el numero empieza por el valor "-" (numero negativo)
    if(numero[0]=="-")
    {
        // Cogemos el numero eliminando los posibles puntos que tenga, y sin
        // el signo negativo
        nuevoNumero=numero.replace(/\,/g,'').substring(1);
    }else{
        // Cogemos el numero eliminando los posibles puntos que tenga
        nuevoNumero=numero.replace(/\,/g,'');
    }

    // Si tiene decimales, se los quitamos al numero
    if(numero.indexOf(".")>=0)
        nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf("."));

    // Ponemos un punto cada 3 caracteres
    for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
        resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ",": "") + resultado;

    // Si tiene decimales, se lo añadimos al numero una vez forateado con 
    // los separadores de miles
    if(numero.indexOf(".")>=0)
        resultado+=numero.substring(numero.indexOf("."));

    if(numero[0]=="-")
    {
        // Devolvemos el valor añadiendo al inicio el signo negativo
        return "-"+resultado;
    }else{
        return resultado;
    }
}

function imprimir(){
    window.print();
}

function generarexcel_vusuario(){
    var tipousuario_id = document.getElementById('tipousuario_id').value;
    var respuesta = document.getElementById('resproducto').value;
    if(respuesta == "" || respuesta == null){
        alert("Primero debe realizar una búsqueda");
    }else{
        var registros =  JSON.parse(respuesta);
        var showLabel = true;
        var reportitle = moment(Date.now()).format("DD/MM/YYYY H_m_s");

                var tam = registros.length;
              
                var mensaje = "";
                
                html = "";
                //if (opcion==1){
                  /* **************INICIO Generar Excel JavaScript************** */
                    var CSV = 'sep=,' + '\r\n\n';
                    //This condition will generate the Label/Header
                    if (showLabel) {
                        var row = "";

                        //This loop will extract the label from 1st index of on array
                        

                            //Now convert each value to string and comma-seprated
                            row += 'Nro.' + ',';
                            row += 'USUARIO' + ',';
                            row += 'VENTAS' + ',';
                            if(tipousuario_id == 1){
                                row += 'COSTO' + ',';
                                row += 'UTILIDAD' + ',';
                            }
                        row = row.slice(0, -1);

                        //append Label row with line break
                        CSV += row + '\r\n';
                    }
                    
                    //1st loop is to extract each row
                    for (var i = 0; i < tam; i++) {
                        var row = "";
                        //2nd loop will extract each column and convert it in string comma-seprated
                        var utilidad = Number(registros[i].totalventas)-Number(registros[i].totalcosto);
                        //utilidades += Number(utilidad);
                            row += (i+1)+',';
                            row += '"' +registros[i]["usuario_nombre"]+ '",';
                            row += '"' +Number(registros[i]["totalventas"]).toFixed(2)+ '",';
                            if(tipousuario_id == 1){
                                row += '"' +Number(registros[i]["totalcosto"]).toFixed(2)+ '",';
                                row += '"' +Number(utilidad).toFixed(2)+ '",';
                            }
                            
                        row.slice(0, row.length - 1);

                        //add a line break after each row
                        CSV += row + '\r\n';
                    }
                    
                    if (CSV == '') {
                        alert("Invalid data");
                        return;
                    }
                    
                    //Generate a file name
                    var fileName = "VentaUsuario_";
                    //this will remove the blank-spaces from the title and replace it with an underscore
                    fileName += reportitle.replace(/ /g,"_");   

                    //Initialize file format you want csv or xls
                    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

                    // Now the little tricky part.
                    // you can use either>> window.open(uri);
                    // but this will not work in some browsers
                    // or you will not get the correct file extension    

                    //this trick will generate a temp <a /> tag
                    var link = document.createElement("a");    
                    link.href = uri;

                    //set the visibility hidden so it will not effect on your web-layout
                    link.style = "visibility:hidden";
                    link.download = fileName + ".csv";

                    //this part will append the anchor tag and remove it after automatic click
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    /* **************F I N  Generar Excel JavaScript************** */
                   
                   
                   
                   
                   //document.getElementById('loader').style.display = 'none';
            //}
         //document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        //}  
        }
}
