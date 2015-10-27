// au chargement de la page
$(function() {
	// quand on valide le formulaire
	$('form').submit(function(event) {
		// annuler le comportement par défaut lors de la validation du formulaire (charge la page désignée par l'attribut "action")
		event.preventDefault()

		// récupérer les données du formulaire
		var formValues = $(this).serialize()

		// envoi Ajax
		$.ajax({
			// l'adresse à laquelle on va envoyer la requête
			// (équivalent "action" d'un form)
			url: 'reponse.php',
			// méthode POST ou GET (équivalent "method" d'un form)
			method: 'POST',
			// on transmet les données
			data: formValues,
			// si la réponse est OK
			success: function(reponseServeur) {
				// == afficher la réponse ==
				// créer et insérer un élément de liste
				// contenant la réponse du serveur
				
				$('<li>').html(reponseServeur).appendTo('#commentaires')

				/* autre façon de faire :
				$('<li>' + reponseServeur + '</li>').appendTo('#commentaires')
				*/
			}
		})
	})
})