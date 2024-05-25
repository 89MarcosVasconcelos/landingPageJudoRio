$('#telefone').mask('(99)99999-9999');

function sendNewMessage(){
	event.preventDefault();
	var nome = $('#nome').val();
	var telefone = $('#telefone').val();
	var email = $('#email').val();
	var mensagem = $('#mensagem').val();
	var cidade = $('#cidade').val();
	var bairro = $('#bairro').val();
	var contagem = 0;
	//name validate
	
	if (nome.length <= 3) {		
		contagem = 1;
		$('#nome').css("border-color", "red");
	} else {
		$('#nome').removeAttr('style');
	}
	
	if (cidade.length <= 3) {		
		contagem = 1;
		$('#cidade').css("border-color", "red");
	} else {
		$('#cidade').removeAttr('style');
	}
	
	//phone validate
	if ((telefone.length > 0) && (telefone.length < 11)) {
		contagem = 1;
		$('#telefone').css("border-color", "red");
	} else {
		$('#telefone').removeAttr('style');
	}
	
	//email validade
	if (validateEmail(email) == false) {
		contagem = 1;
		$('#email').css("border-color", "red");
	} else {
		$('#email').removeAttr('style');
	}
	
	//message validate
	if (mensagem.length <= 3) {
		contagem = 1;		
		$('#mensagem').css("border-color", "red");
	} else {
		$('#mensagem').removeAttr('style');
	}
	
	//if cont not has values, the script start the arquive to submit
	if (contagem == 0) {

		
		$.ajax({
    type: 'POST',
    url: 'form.php',
    data: { 
			nome: nome,
			email: email,
			telefone: telefone,
			mensagem: mensagem,
			cidade: cidade,
			bairro: bairro,
			contagem: contagem // <-- the $ sign in the parameter name seems unusual, I would avoid it
    },
    success: function(msg){
        
				// Limpa os inputs
				$('#mensagem1').val('');
                if ($('#sended').hasClass('defaultReturnMessage')) {
				    $('#sended').removeClass('defaultReturnMessage');
					$('#sended').addClass('returnMessage');
                }
                setTimeout(function(){ 
				$('#sended').removeClass('returnMessage');
				$('#sended').addClass('defaultReturnMessage');
				}, 4000);
			
    }
});


	} else {
		return false;
	}

	}

	function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

function hideMessage(idMessage) {
	$(idMessage).removeClass('returnMessage');
	$(idMessage).addClass('defaultReturnMessage');
	//$(idMessage).removeClass('returnMessage').addClass('defaultReturnMessage');
}
