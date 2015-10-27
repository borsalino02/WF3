	function verif(form)
		{
			var message='';
			if(form.utilisateur.value==='')message +="- login non renseigné\n";
			if(form.motDePasse.value==='')message +="- mot de passe non renseigné\n";
			if(message!='')
			{
				alert(message);
				return false;
			}
			else return true;
		}