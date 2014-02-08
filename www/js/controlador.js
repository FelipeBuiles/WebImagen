$(function(){
	init();
});

function init(){

	$("#btnRegistro").on("click", function(){
		registroUsuario();
	});
}

function registroUsuario(){
	var nombre, email, pass;
	nombre 			= campoNombre.value;
	email 			= campoEmail.value;
	pass 			= campoPassword.value;
	var urlService 	= "http://localhost/webimagen/servicios/ServicioUsuario.php";
	var params		= "nombreServicio=registro" + "&nombre=" + nombre + "&email=" + email + "&password=" + pass;
	callService(urlService, params, 'success', 'jsonp');
} 

function callService(urlService, params, cb, dataT){
    $.ajax({
        dataType:       'jsonp',
        url:            urlService,
        data:           params,
        type:           "GET",
        crossDomain:    true, 
        jsonpCallback:  cb,
        succes: function(r) {
            alert(r);
        }, 
        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        }});
}

function success(data){
    if(data == "false"){
        alert("Este email ya esta registrado");
    }else{
        alert("se ha registrado exitosamente")
    }
}