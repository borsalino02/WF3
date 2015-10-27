$(function() {
	$('button').click(function () {
		// on prévient l'utilisateur que le clic est pris en compte
		// en affichant "... en attente d'une réponse ..." sur le bouton
		var jBouton = $(this)
		var idTimeout = setTimeout(function() {
			jBouton.text("... en attente d'une réponse ...")
		}, 100)


		// on envoie une requête au serveur
		$.ajax({
			// on interroge le serveur sur reponse.php
			url: "reponse.php",
			// si la réponse est OK
			success: function(reponseServeur) {
				$('#reponse').text(reponseServeur)
				$('#erreur').hide()
			},
			// s'il y a une erreur
			error: function() {
				$('#erreur')
					.text("Houston, on a un problème")
					.show()
			},

			complete: function() {
				// on réinitialise le texte du bouton
				jBouton.text("Bonjour")
				// pour les cas où le serveur répond plus vite que 100ms
				// plus besoin de changer le texte du bouton avec "... en attente d'une réponse ..."
				// pour ça, on annule le time-out
				clearTimeout(idTimeout)
			}
		})
	})
})