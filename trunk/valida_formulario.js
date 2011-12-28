
 
  
function valida_formulario(F) {  
        
    var res=true;         
          
    var mensaje_error = " "; 
        
        //F.elements[1].value
    //Eliminamos todos los espacios en blanco delante y detras 
    F.nombre.value = eliminaEspacios(F.nombre.value);     
    F.apellidos.value = eliminaEspacios(F.apellidos.value);
    F.usuario.value = eliminaEspacios(F.usuario.value);
    F.correo.value = eliminaEspacios(F.correo.value);
       
	
	
	var contrasena_1=F.password.value;
	var contrasena_2=F.cpassword.value;
	
	//Color negro para todos los campos
	document.getElementById('divPassword').style.color='black';
	document.getElementById('divNombre').style.color='black';
	document.getElementById('divApellidos').style.color='black';
	document.getElementById('divUsuario').style.color='black';
	document.getElementById('divCorreo').style.color='black';
	
              
        if(vacio(F.nombre.value)) {      	 	  
          	document.getElementById('divNombre').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Introduzca un nombre valido!</font><p>';
            res = false;
        }
        
         if(vacio(F.apellidos.value)) {  
        		document.getElementById('divApellidos').style.color='red';
        	    mensaje_error = mensaje_error + '<font color="red">Introduzca un apellido valido!</font><p>';
                res = false;
        }
        
        if(vacio(F.usuario.value)) { 
        		document.getElementById('divUsuario').style.color='red'; 
                mensaje_error = mensaje_error + '<font color="red">Introduzca un usuario valido!</font><p>';
                res = false;
        }
        
        if(vacio(F.correo.value) || !validaCorreo(F.correo.value) ){
        	document.getElementById('divCorreo').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Introduzca un correo valido!</font><p>';
        	res = false;
        }
        
        if(vacio(contrasena_1) || vacio(contrasena_2)){
        	document.getElementById('divPassword').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Introduzca un password valido!</font><p>';
        	res = false;
        	
        }
        
        if(contrasena_1!=contrasena_2){
        	document.getElementById('divPassword').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Error de confirmacion de password!</font><p>';
        	res = false;
        }
        
        if(   !validaFecha(F.fecha_nacimiento.value) && F.fecha_nacimiento.value!=""){
        	document.getElementById('divFecha').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Introduzca una fecha valida!</font><p>';
        	res = false;
        }
        
        
        //mostramos la varible mensaje_error en formato HTML en el divTransparente
        muestraMensajeError(mensaje_error);
        
        return res;
                  
}  




//--------------Funciones----------------------------------//

// Funcion para eliminar espacios delante y detras de cada cadena
function eliminaEspacios(cadena){
	
	while(cadena.charAt(cadena.length-1)==" "){ 
		cadena=cadena.substr(0, cadena.length-1);
	}
	
	while(cadena.charAt(0)==" "){ 
		cadena=cadena.substr(1, cadena.length-1);
	}
	
	return cadena;
}

//Funcion para comprobar que la cadena no esta vacia
function vacio(cadena) {
	    var res= true;  
        for ( i = 0; i < cadena.length; i++ ) {  
                if ( cadena.charAt(i) != " " ) {  
                        res=false;  
                }  
        }  
        return res; 
}  

//Funcion que valida el correo con una expresion regular
function validaCorreo(valor){	
	var res = false;
	//var reg=/(^[a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30}$)/;
	var reg=/^(.+)@(.+)$/;
	if(reg.test(valor)){
		res = true;
	}
	return res;
}

/*function validaFecha(valor){	
	var res = false;
	var reg=/^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
	if(reg.test(valor)){
		res = true;
	}
	return res;
}
*/

function validaFecha(Cadena){ 
	var res = true; 
	
    var Fecha= new String(Cadena);   //Crea un string 
      
    // Cadena Año  
    var Ano= new String(Fecha.substring(Fecha.lastIndexOf("/")+1,Fecha.length));  
    // Cadena Mes  
    var Mes= new String(Fecha.substring(Fecha.indexOf("/")+1,Fecha.lastIndexOf("/")));  
    // Cadena Día  
    var Dia= new String(Fecha.substring(0,Fecha.indexOf("/")));  
  
  
  
    // Valido el año  isNAN -->> si NO es un numero  parseFloat-->> convierte un String a float
    if (isNaN(Ano) || Ano.length<4 || parseFloat(Ano)<1900){  
           res =false; 
    }  
    // Valido el Mes  
    if (isNaN(Mes) || parseFloat(Mes)<1 || parseFloat(Mes)>12){  
        res = false; 
    }  
    // Valido el Dia  
    if (isNaN(Dia) || parseInt(Dia, 10)<1 || parseInt(Dia, 10)>31){  
        res = false;
    }  
    
    //Para los meses que no acaben en 31 y para el mes de febrero
    if (Mes==4 || Mes==6 || Mes==9 || Mes==11 || Mes==2) {  
        if (Mes==2 && Dia > 28 || Dia>30) {  
            res = false; 
        }  
    }  
      
    return res;   
}  




//Funcion que muestra el error en divTransparente y muestra el div
function muestraMensajeError(msg){
	var error=document.getElementById("divTransparente");
		error.style.display='block';
     	error.innerHTML=msg;
        
}


//-----FUNCIONES SEGURIDAD CLAVE--------//

function seguridad_clave(clave){
   var seguridad = 0;
   if (clave.length!=0){
      if (tiene_numeros(clave) && tiene_letras(clave)){
         seguridad += 25;
      }
      
      if ( (tiene_simbolos(clave) && tiene_letras(clave)) || (tiene_simbolos(clave) && tiene_numeros(clave)) ){
         seguridad += 20;
      }
      
      
      if (tiene_minusculas(clave) && tiene_mayusculas(clave)){
         seguridad += 25;
      }
      
       if (clave.length >= 5 && clave.length <= 6){
         seguridad += 10;
         }else{
             if (clave.length > 6 && clave.length <= 8){
                 seguridad += 25;
               }else{
                  if (clave.length > 8){
                     seguridad += 30;
                  }
               }
        }//Si clave.length>=5 && <=6
        
   }//Si la clave.length !=0
   
   return seguridad            
}    

var letras = "abcdefghyjklmnñopqrstuvwxyz";
var letras_mayusculas ="ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";
var numeros = "0123456789";
var simbolos = "_@-$%&/()=?¿!<>#{}[]*+";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_simbolos(texto){
   for(i=0; i<texto.length; i++){
      if (simbolos.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 


function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_minusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function tiene_mayusculas(texto){
   for(i=0; i<texto.length; i++){
      if (letras_mayusculas.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
} 

function muestra_seguridad_clave(clave,formulario){
   seguridad=seguridad_clave(clave);
   formulario.seguridad.value=seguridad + "%";
} 




