function validacion_registro() {
    $("#errortelefono").addClass( "hidden" );
    $("#errorrepetircontra").addClass( "hidden" );
    var telefono = document.form1.telefono.value;
    var contraseña = document.form1.password.value;
    var repetircontraseña = document.form1.repetirpassword.value;
    var departamento = document.getElementById("departamento").selectedIndex;
    var ciudad = document.getElementById("ciudad").selectedIndex;
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
    else if( departamento == null || departamento == 0 ) {
       $("#departamentoerror").removeClass( "hidden" );  
      return false;
    }
    else if( ciudad == null || ciudad == 0 ) {
       $("#ciudaderror").removeClass( "hidden" );  
      return false;
    }
    return true;
}
function validacion_publicar_vendo() {
    $("#fotoerror").addClass( "hidden" );
    $("#departamentoerror").addClass( "hidden" );
    $("#ciudaderror").addClass( "hidden" );
    $("#categoriaerror").addClass( "hidden" );
    var extensiones_permitidas = new Array(".gif", ".jpg", ".png"); 
    var permitida = false;
    var foto1 = document.form2.foto1.value;    
    var departamento = document.getElementById("departamento").selectedIndex;
    var ciudad = document.getElementById("ciudad").selectedIndex;
    var categoria = document.getElementById("categoria").selectedIndex;
    if( departamento == null || departamento == 0 ) {
       $("#departamentoerror").removeClass( "hidden" );  
      return false;
    }
    if( ciudad == null || ciudad == 0 ) {
       $("#ciudaderror").removeClass( "hidden" );  
      return false;
    }
    if(categoria == null || categoria == 0){
      $("#categoriaerror").removeClass( "hidden" );
      return false;
    }
    if(!foto1){     

    }
    else{
      extension = (foto1.substring(foto1.lastIndexOf("."))).toLowerCase(); 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
           if (extensiones_permitidas[i] == extension) { 
           permitida = true; 
           break; 
           } 
      }
      if(!permitida){
        $("#fotoerror").removeClass( "hidden" );        
        return permitida;
      }      
    }
    if(!foto2){     

    }
    else{
      extension = (foto2.substring(foto2.lastIndexOf("."))).toLowerCase(); 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
           if (extensiones_permitidas[i] == extension) { 
           permitida = true; 
           break; 
           } 
      }
      if(!permitida){
        $("#fotoerror").removeClass( "hidden" );
        return permitida;
      }      
    }
    if(!foto3){     

    }
    else{
      extension = (foto3.substring(foto3.lastIndexOf("."))).toLowerCase(); 
      for (var i = 0; i < extensiones_permitidas.length; i++) { 
           if (extensiones_permitidas[i] == extension) { 
           permitida = true; 
           break; 
           } 
      }
      if(!permitida){
        $("#fotoerror").removeClass( "hidden" );      
        return permitida;
      }
    }

    return true;
}
function validacion_compro(){
  var categoria = document.getElementById("categoria").selectedIndex;
  if(categoria == null || categoria == 0){
    $("#categoriaerror").removeClass( "hidden" );
    return false; 
  }
  return true;
}
function validar_contrasena() {
    $("#errorrepetircontra").addClass( "hidden" );
    $("#errorcontra").addClass( "hidden" );
    var contraseña = $("#contraseña").val();
    var repetircontraseña = $("#repetircontraseña").val();
    if (contraseña!=repetircontraseña) {          
        $("#errorrepetircontra").removeClass( "hidden" );
        return false;          
    }       
    else if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,50})$/.test(contraseña))){
        $("#errorcontra").removeClass( "hidden" );
        return false;
    }
    return true;
}
function validar_telefono(){
    $("#errortelefono").addClass( "hidden" );
    var telefono = $("#telefono").val();
    if (isNaN(telefono)) {
        $("#errortelefono").removeClass( "hidden" );
        return false;
    }
    return true;
}

function validacion_modificar_vendo() {
    $("#departamentoerror").addClass( "hidden" );
    $("#ciudaderror").addClass( "hidden" );
    var departamento = document.getElementById("departamento").selectedIndex;
    var ciudad = document.getElementById("ciudad").selectedIndex;
    if( departamento == null || departamento == 0 ) {
       $("#departamentoserror").removeClass( "hidden" );  
      return false;
    }
    if( ciudad == null || ciudad == 0 ) {
       $("#ciudadeserror").removeClass( "hidden" );  
      return false;
    }
    return true;
}
    
