function validacion_registro() {
    var telefono = document.form1.telefono.value;
    var contraseña = document.form1.password.value;
    var repetircontraseña = document.form1.repetirpassword.value;
    if (isNaN(telefono)) {
      	$("#errortelefono").removeClass( "hidden" );
      	return false;
    }
    else if (contraseña!=repetircontraseña) {          
      	$("#errorrepetircontra").removeClass( "hidden" );
      	return false;          
    }       
    else if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,50})$/.test(contraseña))){
      $("#errorcontra").removeClass( "hidden" );
      return false;
    }
    return true;
}
function validacion_publicar_vendo() {
    var telefono = document.form1.telefono.value;
    var contraseña = document.form1.password.value;
    var repetircontraseña = document.form1.repetirpassword.value;
    if (isNaN(telefono)) {
        $("#errortelefono").removeClass( "hidden" );
        return false;
    }
    else if (contraseña!=repetircontraseña) {          
        $("#errorrepetircontra").removeClass( "hidden" );
        return false;          
    }       
    else if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,50})$/.test(contraseña))){
      $("#errorcontra").removeClass( "hidden" );
      return false;
    }
    return true;
}