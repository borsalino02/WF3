function shuffle(o){
    for(var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
    return o;
}
var assemblerJeux =function(tab1, tab2){
	//déclare un tableau
	var tableauComplet =[]
	// assemble les 2 tableaux en argument
	// on boucle sur le 1er tableau
		for(var i=0; i<tab1.length;i++) {
		// on pousse chaque élément dans le tableau complet
		tableauComplet.push(tab1[i])	
		}
		// on boucle sur le 2e tableau
		for(var i=0; i<tab2.length;i++) {
		// on pousse chaque élément dans le tableau complet
		tableauComplet.push(tab2[i])	
		}
	//retourne le tableau assemblé
	return tableauComplet
}

var construireJeuCartes = function() {
	var tableauDivParent=[]
	// on boucle 14 fois, pour construire un premier jeu de cartes
	for (var i=0; i<14; i++){
		// on crée un div parent
		var divParent=$('<div></div>')
		// on envoie le div parent au div grand papa
		// on crée un div enfant avec la classe "cache"
		// on l'ajoute au div parent
		$('<div class="cache"></div>').appendTo(divParent)
		// on crée un div enfant avec la classe "image"
		// on l'ajoute au div parent
		var image = $('<div class="image"></div>').appendTo(divParent)
		// on affiche une image différente a chaque fois
		image.css({
			// on applique la propriété css background-position-y
			backgroundPosition: '0 ' + (i * 100) + 'px'
		})

		// on ajoute le div parent dans le tableau
		tableauDivParent.push(divParent)
	}	

	return tableauDivParent
}
// attendre que le DOM soit charge
$(function() {
	var uneCarteDejaRetournee

	// on récupére le bouton
	var jBouton =$('#bouton-jouer')

	// == on construit le plateau ==

	// on construit un premier jeu de cartes
	var jeu1 = construireJeuCartes()

	// on construit un deuxiéme jeu de cartes
	var jeu2 = construireJeuCartes()

	// on assemble les 2 jeux dans un tableau
	var jeuComplet =  assemblerJeux(jeu1, jeu2)

	// on mélange le jeu complet
	shuffle(jeuComplet)

	// on ajoute les cartes (mélangées) au plateau
	for(var i=0;i <jeuComplet.length; i++) {
	jeuComplet[i].appendTo('#plateau')
	}

	//Au clique sur le bouton
	jBouton.on('click', function(){
		// ==on affiche le #plateau==
		// masquer le bouton
		jBouton.hide()
		// ou $(this).hide()

		// rendre visible le div#plateau
		$('#plateau').show()
	})

// au clic sur une carte retournée
	$('.cache').on('click',function(){
	// == retourner une carte ==
	// au clique sur une carte
		// masque la div .cache correspondante
		$(this).hide()
		//==affiche la div .image correspondante==
		//on part du .cache cliqué
		// on remonte sur le div parent
		// on selectionne parmi les enfants du div parent
		// le div avec la classe .image
		$(this).parent().children('.image').show()
		// == vérifications==

		//si on retourne 1carte
		if(!uneCarteDejaRetournee) {
			uneCarteDejaRetournee =true
		}
		// si on retourn 2e cartes
		if (uneCarteDejaRetournee){
			// si les 2 cartes sont identiques
			// (comparer les backgroundPosition)
			// on laisse les cartes retournées
			//si les cartes sont différentes
			//on les cache
		}
	})

})