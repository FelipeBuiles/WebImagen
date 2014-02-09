$(function(){
	init();
});

function init(){

	$("#btnRegistro").on("click", function(){
		registroUsuario();
	});
    $("#btnLogin").on("click", function(){
        login();
    });
}

function registroUsuario(){
	var nombre, email, pass;
	nombre 			= campoNombre.value;
	email 			= campoEmail.value;
	pass 			= campoPassword.value;
	var urlService 	= "http://localhost/webimagen/servicios/ServicioUsuario.php";
	var params		= "nombreServicio=registro" + "&nombre=" + nombre + "&email=" + email + "&password=" + pass;
	callService(urlService, params, 'exito');
} 

function login(){
    var email, pass;
    email           = campoEmailLogin.value;
    pass            = campoPasswordLogin.value;
    var urlService  = "http://localhost/webimagen/servicios/ServicioUsuario.php";
    var params      = "nombreServicio=login" + "&email=" + email + "&password=" + pass;
    callService(urlService, params, 'procesoInicio');
} 

function callService(urlService, params, cb){
    $.ajax({
        dataType:       'jsonp',
        url:            urlService,
        data:           params,
        type:           "GET",
        crossDomain:    true, 
        jsonpCallback:  cb,
        error: function(xhr, status, error) {
            console.log("test");
            console.log(xhr);
            console.log(status);
            console.log(error);
        }});
}

function exito(data){
    if(data == "false"){
        alert("Este email ya esta registrado");
    }else{
        alert("se ha registrado exitosamente")
    }
}

function procesoInicio(data){
    window.top.location.href = 'index.html?' + data;
}