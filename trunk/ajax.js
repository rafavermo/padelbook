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

function eventos() {
	
  cargaContenido("eventos.php", "GET", muestraContenido);
}

function crear_evento() {
	
  cargaContenido("crear_evento.php", "GET", muestraContenido);
}

function grupos() {
	
  cargaContenido("grupos.php", "GET", muestraContenido);
}

function crear_grupo() {
	
  cargaContenido("crear_grupo.php", "GET", muestraContenido);
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////

//Funcion que muestra el menu con opciones con el javscripta activado
function mostrarMenuConJavascript(){
	
	//Esto es para que muestre el divMenuConjavascript de la columna izquierda con javascript
	var menu=document.getElementById("divmenuConJavascript");
	menu.style.display='block';
	
	
	//Esto es para el reloj que se actualiza cada segundo
	
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mostrarMenuConJavascript()",1000)

}


