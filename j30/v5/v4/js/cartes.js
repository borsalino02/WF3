// attendre que le document soit chargé
$(function() {

/* == Fermeture des cartes == */

// au moment où on clique sur le bouton "fermer"
$('.close-button').click(function() {
	// on masque la carte
	$(this).parent().fadeOut('slow')
})

/* == Sélection des cartes == */

// on récupère toutes les images incluses dans les cartes
var jImagesCarte = $('.carte img')
// au clic sur l'image d'une carte
jImagesCarte.click(function() {
	// == sélectionner la carte
	// récupérer la carte concernée
	var jCarteCliquee = $(this).parent()
	// = fond de couleur sur la carte =
	// si la carte concernée est déjà sélectionnée
	if (jCarteCliquee.hasClass('selectionnee')) {
		// on la désélectionne
		jCarteCliquee.removeClass('selectionnee')
	} else {
		// sinon, on la sélectionne
		jCarteCliquee.addClass('selectionnee')
	}
})

})