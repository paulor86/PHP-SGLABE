
function deleteEquipamento(url){
	$("#btnDelete").attr("href",url);
}

function deleteMaquina(url){
	$("#btnDelete").attr("href",url);
}


function getHorario(){
	turno = $("#turno").val();
	if(turno == 1){
		input = "";
		for(i=7;i<=12;i++){
			aux = i<10 ? ("00" + i).slice(-2):i;
			input +="<option value=\""+aux+"\">"+aux+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else if(turno ==2){
		input = "";
		for(i=12;i<=18;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else{
		input = "";
		for(i=18;i<=22;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}
}


function setHorario(inicio,fim){
	turno = $("#turno").val();
	if(turno == 1){
		inputInicio = "";
		inputFim = "";
		for(i=7;i<=12;i++){
			aux = i<10 ? ("00" + i).slice(-2):i;
			selectedInicio = aux == inicio ? "selected=\"\"" :null;
			selectedFim = aux == fim ?  "selected=\"\"" :null;
			inputInicio +="<option "+selectedInicio+" value=\""+aux+"\">"+aux+"</option>";
			inputFim +="<option "+selectedFim+" value=\""+aux+"\">"+aux+"</option>";
		}
		$("#horarioInicio").html(inputInicio);
		$("#horarioFim").html(inputFim);
	}else if(turno ==2){
		input = "";
		for(i=12;i<=18;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}else{
		input = "";
		for(i=18;i<=22;i++){
			input +="<option value=\""+i+"\">"+i+"</option>";
		}
		$("#horarioInicio").html(input);
		$("#horarioFim").html(input);
	}
}



//Lista as maquinas de um laboratorio

	function listaMaquinasLaboratorio(urlData){
		lab = $('#laboratorio').val();


		$.ajax({
         url : urlData+"/"+lab,
         type : 'post'
     }).done(function(msg){
          $("#listaLaboratorios").html(msg);
    })

	}
//Lista as maquinas de um laboratorio

	function getDataUsuario(urlData){
		$.ajax({
         url : urlData,
         type : 'post'
     }).done(function(msg){
          $("#getDataUsuario").html(msg);
    })

	}



//Validação do CPF

//adiciona mascara ao CPF
	function MascaraCPF(cpf){	
		if(mascaraInteiro(cpf)==false){		
			event.returnValue = false;	
		}		
		return formataCampo(cpf, '000.000.000-00', event);
	}
//valida o CPF digitado
	function ValidarCPF(Objcpf){
		var cpf = Objcpf.value;	
		exp = /\.|\-/g	
		cpf = cpf.toString().replace( exp, "" ); 	
		var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));	
		var soma1=0, soma2=0;	
		var vlr =11;		
		for(i=0;i<9;i++){		
			soma1+=eval(cpf.charAt(i)*(vlr-1));		
			soma2+=eval(cpf.charAt(i)*vlr);		
			vlr--;	
		}		
		soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));	
		soma2=(((soma2+(2*soma1))*10)%11);		
		var digitoGerado=(soma1*10)+soma2;
			if(digitoGerado!=digitoDigitado){
				alert('O CPF digitado é inválido!');	
			} 
	}

	//valida numero inteiro com mascara
	function mascaraInteiro(){	
		if (event.keyCode < 48 || event.keyCode > 57){		
			event.returnValue = false;		
			return false;	
		}	
			return true;
		}
	//valida o CNPJ digitado
	function formataCampo(campo, Mascara, evento) { 	
		var boleanoMascara; 		
		var Digitato = evento.keyCode;	
		exp = /\-|\.|\/|\(|\)| /g
		campoSoNumeros = campo.value.toString().replace( exp, "" );    	
		var posicaoCampo = 0;	 	
		var NovoValorCampo="";	
		var TamanhoMascara = campoSoNumeros.length;		
		if (Digitato != 8) { 
			for(i=0; i<= TamanhoMascara; i++) { 	
				boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")	|| (Mascara.charAt(i) == "/")) ;
				boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "));
				 if (boleanoMascara) { 				
				 	NovoValorCampo += Mascara.charAt(i); 
				 	TamanhoMascara++;			
				 }else { 				
				 	NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 				
				 	posicaoCampo++; 			  
				 }	   	 		  
			}	 		
			campo.value = NovoValorCampo;		  
			return true; 	
		}else { 		
			return true; 	
		}
	}
