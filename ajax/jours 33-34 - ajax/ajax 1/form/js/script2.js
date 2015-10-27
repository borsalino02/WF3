$(function() {
	// à la soumission du formulaire
	// (sur l'événement "submit" du form)
	$('form').on('submit', function(ev) {
		ev.preventDefault()
		// récupérer les informations des champs du formulaire
		var formValues = $(this).serialize()
		// les envoyer au serveur
		$.ajax({
			url: 'reponse.php',
			// transmettre les données du formulaire
			data: formValues,
			// récupérer la réponse du serveur
			success: function(reponseServeur) {
				// afficher cette réponse
				$('#reponse').text(reponseServeur)
			}
		})
	})
})