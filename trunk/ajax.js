//Variables globales a todos las funciones
var READY_STATE_COMPLETE = 4;

var peticion_http;
 

 
//Funcion que es llmada por el boton login al hacer click con el raton
function logeo() {
	//se le pasan 3 parámetros: la pagina que queremos descargar del servidor, el metodo y la funcion que muestra. en este caso lo muestra en el div de contenido
  cargaContenido("login.html", "GET", muestraContenido);
}

function historia(){
	cargaContenido("historia.html","GET",muestraContenido);	
}

function videos(){
	cargaContenido("videos.html","GET",muestraContenido);	
}

function cargaContenido(url, metodo, funcion) {

	 //instanciamos el objeto XMLHttpRequest
     peticion_http = inicializa_xhr();
 
  	if(peticion_http) {
    	 peticion_http.onreadystatechange = funcion;
    	 //se prepara la peticion
   	 	 peticion_http.open(metodo, url, true);
   	 	 //se envia la peticion al servidor
   	 	 peticion_http.send(null);
  	}
 }

//Funcion que instancia el objeto XMLHttpRequest 
function inicializa_xhr() {
  if(window.XMLHttpRequest) {
    return new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}
 

//Una vez realizada la peticion se comprueba que el servidor ha dao el visto bueno y realizamos lo que sea
function muestraContenido() {
  if(peticion_http.readyState == READY_STATE_COMPLETE) {
    if(peticion_http.status == 200) {  	 
         document.getElementById("contenido").innerHTML = peticion_http.responseText;
    }
  }
}

function mostrarMenuConJavascript(){
	var menu=document.getElementById("divmenuConJavascript");
	menu.style.display='block';
}



