

 function valida_crea_evento(formulario){
 	
 	var res=true;
 	
 	var mensaje_error = " ";
 	
 	//Color inicial para todos los campos
	document.getElementById('ciudad_evento').style.borderColor='#aacfe4';
	document.getElementById('centro_evento').style.borderColor='#aacfe4';
	document.getElementById('pistas_evento').style.borderColor='#aacfe4';
	document.getElementById('fecha').style.borderColor='#aacfe4';
	document.getElementById('hora_evento').style.borderColor='#aacfe4';

    //Eliminamos todos los espacios en blanco delante y detras 
    // formulario.ciudad_evento.value = eliminaEspacios(formulario.ciudad_evento.value);     
    // formulario.centroID.value = eliminaEspacios(formulario.centroID.value);
    // formulario.pistaID.value = eliminaEspacios(formulario.pistaID.value);
    // formulario.fecha.value = eliminaEspacios(formulario.fecha.value);
    // formulario.hora.value = eliminaEspacios(formulario.hora.value);
    
     // print(formulario.ciudad_evento.value);     
     // print(formulario.centro_evento.value);
     // print(formulario.pistas_evento.value);
     // print(formulario.fecha.value);
     // print(formulario.hora.value);
    
 	 //Usamos las mismas funciones que en valida_formulario del registro
 	 
 	 if(formulario.ciudad_evento.value==""){
       	document.getElementById('ciudad_evento').style.borderColor='red';
       	mensaje_error = mensaje_error + 'Debe seleccionar una ciudad!<br>';
       	res = false;
      }
 	 
 	 
 	 if(formulario.centroID.value==""){
       	document.getElementById('centro_evento').style.borderColor='red';
       	mensaje_error = mensaje_error + 'Debe seleccionar un centro deportivo!<br>';
       	res = false;
      }
 	 
 	  if(formulario.pistaID.value==""){
       	document.getElementById('pistas_evento').style.borderColor='red';
       	mensaje_error = mensaje_error + 'Debe seleccionar una pista!<br>';
       	res = false;
       }
 	 
 	  if(formulario.hora.value==""){
       	document.getElementById('hora_evento').style.borderColor='red';
       	mensaje_error = mensaje_error + 'Debe seleccionar una hora!<br>';
       	res = false;
       }
 	 
 	 
 	if(!validaFecha(formulario.fecha.value) || formulario.fecha.value==""){
    	document.getElementById('fecha').style.borderColor='red';
        mensaje_error = mensaje_error + 'Introduzca una fecha valida!<br>';
        res = false;
      }
	
    
   
    
   
   
        
       //mostramos la varible mensaje_error en formato HTML en el divTransparente 
        muestraMensajeError(mensaje_error);
        
      return res; 
 	
 }
 
 function muestraMensajeError(msg){
	var error=document.getElementById("errores");
		error.style.display='block';
		error.innerHTML=msg;	
		    	
        
}

function eliminaEspacios(cadena){
	
	while(cadena.charAt(cadena.length-1)==" "){ 
		cadena=cadena.substr(0, cadena.length-1);
	}
	
	while(cadena.charAt(0)==" "){ 
		cadena=cadena.substr(1, cadena.length-1);
	}
	
	return cadena;
}

function vacio(cadena) {
	    var res= true;  
        for ( i = 0; i < cadena.length; i++ ) {  
                if ( cadena.charAt(i) != " " ) {  
                        res=false;  
                }  
        }  
        return res; 
} 
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