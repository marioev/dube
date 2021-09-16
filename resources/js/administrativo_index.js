function mostrar_modalcambiar(admin_id){
    $("#es_adminid").val(admin_id);
    $("#nuevo_pass").val("");
    $("#repita_pass").val("");
    $('#modalcambiar').modal('show');
}
