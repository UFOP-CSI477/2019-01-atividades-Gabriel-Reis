function calcular() {

	var Amplitude = parseFloat(document.Escala.Amplitude.value);
	var Delta = parseFloat(document.Escala.Delta.value);

	var val1 = validarNumero(document.Escala.Amplitude,"alertaAmplitude");
	var val2 = validarNumero(document.Escala.Delta,"alertaDelta");
	
	if(val1 && val2){
		var Escala = ( (Math.log10(Amplitude)) + (3*Math.log10(8*Delta)) - 2.92).toFixed(2);
		// log10 A + 3.log10(8.∆t)−2,92

		document.Resposta.EscalaResp.value = "Escala Richter: " +Escala;
		document.Resposta.EscalaDadosAmplitude.value = "Amplitude: " +Amplitude;
		document.Resposta.EscalaDadosDelta.value = "Delta: " +Delta;

		document.getElementById("divResultado").style.display = "block";
		document.getElementById("divTableEscala").style.display = "block";
		destacar(IndexEscala(Escala));
		limpaDados(document.Escala.Amplitude);
		limpaDados(document.Escala.Delta);
  	}	

}

function IndexEscala(Escala){
	if(Escala < 3.5)
		return 1;
	else if (Escala <= 5.4)
		return 2;
	else if (Escala <= 6)
		return 3;
	else if (Escala <= 6.9)
		return 4;
	else if (Escala <= 7.9)
		return 5;
	else
		return 6;
}

function validarTexto(campo, alerta){
	var alerta = document.getElementById(alerta);

	if(campo.value.length == 0){
		alerta.style.display = "block";
	    campo.classList.add("is-invalid");
    	campo.value = "";
    	campo.focus();
    	return false;
	}
	alerta.style.display = "none";
  	campo.classList.remove("is-invalid");
  	campo.classList.add("is-valid");
  	return true;
}

function validarNumero(campo, alerta){
  	var n = parseFloat(campo.value);
	var alerta = document.getElementById(alerta);

	if(campo.value.length == 0 || isNaN(n) || n <= 0){
		alerta.style.display = "block";
	    campo.classList.add("is-invalid");
    	campo.value = "";
    	campo.focus();
    	return false;
	}
	alerta.style.display = "none";
  	campo.classList.remove("is-invalid");
  	campo.classList.add("is-valid");
  	return true;
}

function limpaDados(campo){
	campo.value = "";
	campo.classList.remove("is-valid");
}

function destacar(Index){
	var table = document.getElementById("TableEscala");

	for(var i = 1; i < table.rows.length; i++){
		//var celula = table.rows[i].getElementsByTagName("td");
		if(i==Index){	
			var linha = table.rows[i]
			if(i==1)
				linha.classList.add("bg-success");
			else if(i==2)
				linha.classList.add("bg-info");
			else if(i==3)
				linha.classList.add("bg-warning");
			else
				linha.classList.add("bg-danger");
		}
		else{
			table.rows[i].classList.remove("bg-warning");
			table.rows[i].classList.remove("bg-info");
			table.rows[i].classList.remove("bg-success");
			table.rows[i].classList.remove("bg-danger");
		}
  	}
}