

 function valida_crea_evento(F){
 	
 	var res=true;
 	
 	var mensaje_error = " ";
 	
 	 //Usamos las mismas funciones que en valida_formulario del registro
 	  if( !validaFecha(F.fecha.value) && F.fecha.value!=""){
        	document.getElementById('FechaCreaEvento').style.color='red';
        	mensaje_error = mensaje_error + '<font color="red">Introduzca una fecha valida!</font><p>';
        	res = false;
        }
        
       //mostramos la varible mensaje_error en formato HTML en el divTransparente USANDO la funcion de valida formulario de registro
        muestraMensajeError(mensaje_error);
        
        return res; 
 	
 }
