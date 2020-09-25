//Ajax va nous permettre juste de raffraichir une partie de notre formulaire et 
//pas toute la page et il est relié à Jqurry pour démarrer le code une fois que les éléments sont apparus
$( function () {

	$('#contact-form').submit(function(e){
		e.preventDefault();//permet d'éviter le comportement par dédaut lorsqu'on est dans le formulaire
		$('.comments').empty();
		// alert ("moi");
		
		var postdata= $("#contact-form").serialize();
		//cherche touts éléments du formulaire et les mettre ds une variable:postdata

		$.ajax({
			type:'POST',
			url: 'php/contact.php',
			data: postdata,
			dataType: 'json',
			success: function(result) {
				
				if (result.$isSuccess)
					
				 	{
						$("#contact-form").append("<p class='thank-you'>Votre message a bien été envoyé .Merci de m'avoir contacté:)</p>");
						$("#contact-form")[0].reset();
					}
			
				else 
					{		
						$('#firstname + .comments').html(result.firstnameError);
						$('#name + .comments').html(result.nameError);
						$('#email + .comments').html(result.emailError);
						$('#phone + .comments').html(result.phoneError);
						$('#message + .comments').html(result.messageError);
					}


			}

					

			});
	
		});
})