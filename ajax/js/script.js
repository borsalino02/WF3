$(function() {

		$('form').submit(function(ev){
			ev.preventDefault())
			var formValues=$(this).serialize()
			/*var prenomValue=$('[name=prenom]').val()
			var nomValue=$('[name=nom]').val()*/
			$.ajax({
				url:'reponse.php',
				method:'POST',
				data: formValues,/*{
					prenom : prenomValue,
					nom: nomValue,
				},*/
				success: function(reponseServeur){
					$(/*'#reponse').html(*/'<li>').html(reponseServeur).appendTo("#reponse")
				}
			})
	/*$('button').click(function() {*/
		
/*		var jBouton =$(this)
		var temps =setTimeout(function(){
			jBouton.text("En attente d'une réponse")
		}, 100)


		$.ajax({
			url:"reponse.php",
			success: function(reponse) {
				$('#reponse').text(reponse)
				$('#erreur').hide()
			},
			error: function() {
				$('#erreur').text(" Mise a jour WINDOWS... Veuillez patienter...")
				.show()
			},
			complete: function() {
				jBouton.text("Bonjour")
			clearTimeout(temps)
			}
		})*/
	})
})