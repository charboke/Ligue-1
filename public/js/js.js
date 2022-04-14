function verifForm() {

    var sociale = document.getElementById("sociale").value;

    var code = document.getElementById("code").value;

    var siret = document.getElementById("siret").value;

    var tva = document.getElementById("tva").value;

    var forme = document.getElementById("forme").value;

    var client = document.getElementById("client").value;

    var secteur = document.getElementById("secteur").value;

    var civilite = document.getElementById("civilite").value;

    var nom = document.getElementById("nom").value;

    var prenom = document.getElementById("prenom").value;

    var adresse = document.getElementById("adresse").value;

    var adresse2 = document.getElementById("adresse2").value;

    var code = document.getElementById("code").value;

    var ville = document.getElementById("ville").value;

    var pays = document.getElementById("pays").value;

    var tel = document.getElementById("tel").value;

    var tel2 = document.getElementById("tel2").value;

    var mail = document.getElementById("mail").value;

    var mail2 = document.getElementById("mail2").value;

    var site = document.getElementById("site").value;

    var commentaire = document.getElementById("commentaire").value;


  
  

    if (sociale == "" || code == "" || siret == "" || tva == "" || forme == "" || client == "" || secteur == "" || civilite == "" || nom == "" || prenom == "" || adresse == "" || adresse2 == "" || code == "" || ville == "" || pays == "" || tel == "" || tel2 == "" || mail == "" || mail2 == "" || site == "" || commentaire == "")  {
        alert("Tous les champs doivent être remplis")
        return false;
    }

    var regexRule = new RegExp("^(?=.*[@])(?=.{4,})");
    var res = regexRule.test(mail);
    var res2 = regexRule.test(mail2);
 

    if(res == false || res2 == false){
        alert("Format mail incorrect");
        return false;
    }

    if(mail2 != mail)
    {
       
        document.getElementById("errorEmail2").innerHTML = "L'adresse mail ne correspond pas";
        return false;
    }
  
}