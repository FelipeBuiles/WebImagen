window.onload = mostrarLista();


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

    var uploader = document.getElementById('uploadButton');
    upclick(
     {
      element: uploader,
      action: '../modelo/upload.php', 
      onstart:
        function(filename){
            menuImagen(filename);
        }
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

function verificarLogin(){
    var urlService  = "http://localhost/webimagen/servicios/ServicioUsuario.php";
    var params      = "nombreServicio=session";
    callService(urlService, params, "procesoInicio");
}

function mostrarLista(){
    var urlService  = "http://localhost/webimagen/servicios/ServicioImagenes.php";
    var params      = "nombreServicio=listar";
    callService(urlService, params, "cargarImagenes");
}

function menuImagen(filename){
    var src, descripcion;
    src             = filename;
    console.log(src);
    descripcion     = campoDescripcion.value;
    var urlService  = "http://localhost/webimagen/servicios/ServicioImagenes.php";
    var params      = "nombreServicio=subir" + "&src=" + src + "&descripcion=" + descripcion;
    callService(urlService, params, 'successImagen');
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
            console.log(xhr);
            console.log(status);
            console.log(error);
        }});
}

function cargarImagenes(data){
    for(var i = data[0].length-1; i >= 0 ; i--){
        var str = '<div class="contenedor1">';
        str += "<div class='contenedor2'><img class='imagen'";
        str += " id=imagen"+data[0][i].id;
        str += " src="+data[0][i].src+">"; 
        str += "<a href='" + data[0][i].src + "' download='" + data[0][i].src.substring(15) + "'>"; 
        str += '<button class="btn" id="btnDescarga">Descargar</button></a>';
        str += '</div> </div>';
        $('.lista').append(str); 
    }
}

function exito(data){
    if(data == "false"){
        alert("Este email ya esta registrado");
    }else{
        alert("se ha registrado exitosamente")
    }
}

function procesoInicio(data){
    if(data[0] === -1){
        window.top.location.href = 'registro.html';
    } else {
        window.top.location.href = 'index.html';
    }
}

function successImagen(data){
    if(data == "false"){
        alert("La imagen no se ha podido subir al servidor");
    }else if(data == "true"){
        //alert("Imagen subida exitosamente")
    }
}