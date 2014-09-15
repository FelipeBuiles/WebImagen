var url = "http://localhost/webimagen/servicios/";

window.onload = function(){
    mostrarLista();
    verificarLogin();
}

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

    $("#btnUpload").on("click", function(){
       if (usr == -1){
           window.top.location.href = "registro.html";
        } else {
           subirImagen();
        }
    });

    $("#btnBuscar").on("click", function(){
        buscarImagen();
    });
}

function registroUsuario(){
	var nombre, email, pass;
	nombre 			= campoNombre.value;
	email 			= campoEmail.value;
	pass 			= campoPassword.value;
	var urlService 	= url + "ServicioUsuario.php";
	var params		= "nombreServicio=registro" + "&nombre=" + nombre + "&email=" + email + "&password=" + pass;
	callService(urlService, params, 'exito');
}

function login(){
    var email, pass;
    email           = campoEmailLogin.value;
    pass            = campoPasswordLogin.value;
    var urlService  = url + "ServicioUsuario.php";
    var params      = "nombreServicio=login" + "&email=" + email + "&password=" + pass;
    callService(urlService, params, 'procesoLogin');
}

function verificarLogin(){
    var urlService  = url + "ServicioUsuario.php";
    var params      = "nombreServicio=session";
    callService(urlService, params, "procesoInicio");
}

function cargarBoton(){
    if (verificarLogin()){
        mostrarBotonSubida();
    }
}

function subirImagen(){
    var uploader = document.getElementById('btnUpload');
    upclick(
     {
      element: uploader,
      action: '/webImagen/modelo/upload.php', 
      onstart:
        function(filename){
            menuImagen(filename);
        }
     });
}

function mostrarLista(){
    var urlService  = url + "ServicioImagenes.php";
    var params      = "nombreServicio=listar";
    callService(urlService, params, "cargarImagenes");
}

function menuImagen(filename){
    var src, descripcion;
    src             = filename.substring(12);
    descripcion     = campoDescripcion.value;
    var urlService  = url + "ServicioImagenes.php";
    var params      = "nombreServicio=subir" + "&src=" + src + "&descripcion=" + descripcion;
    callService(urlService, params, 'successImagen');
}

function buscarImagen(){
    var criterio    = campoCriterio.value;
    var urlService  = url + "ServicioImagenes.php";
    var params      = "nombreServicio=buscar" + "&criterio=" + criterio;
    callService(urlService, params, 'successBuscar');
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
        alert("Se ha registrado exitosamente");
    }
}

function procesoLogin(data){
    if (data[0] != -1){
        window.top.location.href = "index.html";
    }
}

function procesoInicio(data){
    window.usr = data[0];
    if (usr != -1){
        var str = '<img class="usrImg" src="img/usr.jpg"/><h1>';
        str     += usr.nombre;
        str     += '</h1>';
        $(str).insertBefore("#campoDescripcion");
    }
}

function successImagen(data){
    if(data == "false"){
        alert("La imagen no se ha podido subir al servidor");
    }else if(data == "true"){
        //alert("Imagen subida exitosamente")
    }
}

function successBuscar(data){
    if(data[0].length > 0){
        var array = data[0];
        $(".contenedor1").remove();
        for(var i = array.length-1 ; i >= 0; i--){
            var str = '<div class="contenedor1">';
            str += "<div class='contenedor2'><img class='imagen'";
            str += " id=imagen"+array[i].id;
            str += " src="+data[0][i].src+">";
            str += "<a href='" + array[i].src + "' download='" + array[i].src.substring(15) + "'>";
            str += '<button class="btn" id="btnDescarga">Descargar</button></a>';
            str += '</div> </div>';
            $('.lista').append(str);
        }
    } else {
        console.log("no encuentra");
    }
}
