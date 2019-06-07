function adicionar(){
	var Nome = document.Competidor.Nome;
	var Largada = document.Competidor.Largada;
	var Tempo = document.Competidor.Tempo;
 
	var val1 = validarTexto(Nome,"alertaNome");
	var val2 = validarNumero(Largada,"alertaLargada");
	var val3 = validarNumero(Tempo,"alertaTempo");
	var val4 = validarQnt("alertaQuantidade");
	
	if(val1 && val2 && val3 && val4){
		document.getElementById("divTable").style.display = "block";
		var Pos = achaPos(Tempo);
		inserirLinha(Nome, Largada, Tempo, Pos);
		atualizaPosERes();
		limpaDados(Nome, Largada, Tempo);
  	}

}

function achaPos(T){
	var tempo = parseFloat(T.value);
	var table = document.getElementById("Resultado");
	var pos = 1;

	for(var i = 1; i < table.rows.length; i++){
		var linha = table.rows[i];
  		var celula = linha.getElementsByTagName("td");
    	if(celula[3].innerHTML > tempo){
    		pos = i;
    		return pos;
    	}
  	}
}

function inserirLinha(Nome, Largada, Tempo, Pos) {
 	var table = document.getElementById("Resultado");
	var newRow = table.insertRow(Pos);

	// Insere novas células (<td>) na posicao X da "nova" <tr>:
	var cell1 = newRow.insertCell(0);
	var cell2 = newRow.insertCell(1);
	var cell3 = newRow.insertCell(2);
	var cell4 = newRow.insertCell(3);
	var cell5 = newRow.insertCell(4);

	// Modifica texto das células:
	cell1.innerHTML = Pos;
	cell2.innerHTML = Largada.value;
	cell3.innerHTML = Nome.value;
	cell4.innerHTML = Tempo.value;
	cell5.innerHTML = '--------';
}	

function atualizaPosERes(){
	var table = document.getElementById("Resultado");
	var pos = 1;
	var tempoAnt = parseFloat(table.rows[1].getElementsByTagName("td")[3].innerHTML);
	var tempoAtual;

	for(var i = 1; i < table.rows.length; i++){
		var linha = table.rows[i];
  		var celula = linha.getElementsByTagName("td");
    	tempoAtual = parseFloat(celula[3].innerHTML);
    	if(tempoAnt < tempoAtual){
    		pos++;
    	}
    	celula[0].innerHTML = pos;
    	if(celula[0].innerHTML == 1){
    		celula[4].innerHTML = "Vencedor";	
    	}
    	else{
    		celula[4].innerHTML = "--------";		
    	}
    	tempoAnt = parseFloat(celula[3].innerHTML);
  	}

  	// document.getElementById("Resultado").classList.remove("table-striped");
  	// document.getElementById("Resultado").classList.add("table-striped");
  }

function limpaDados(campo, campo1, campo2){
	campo.value = "";
	campo1.value = "";
	campo2.value = "";
	campo.classList.remove("is-valid");
	campo1.classList.remove("is-valid");
	campo2.classList.remove("is-valid");
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

function validarQnt(alerta){
  	var tam = document.getElementById("Resultado").rows.length;
	var alerta = document.getElementById(alerta);

	if(tam >= 7){
		alerta.style.display = "block";
    	return false;
	}
	alerta.style.display = "none";
  	return true;
}