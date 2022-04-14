/*function verifForm()
{
    var mail = document.getElementById("mail").value;
    var password = document.getElementById("password").value;

    if(mail != "admin@cci.fr" || mail == "")
    {
        document.getElementById("errorId").innerHTML = "Identifiant ou mot de passe incorrect"
        document.getElementById("errorId").classList.add("red");
        return false;

    } else {
   
        document.getElementById("errorId").innerHTML = ""
        document.getElementById("errorId").classList.remove("red");
    }

    if(password != 1234 || mail == "")
    {
        document.getElementById("errorId").innerHTML = "Identifiant ou mot de passe incorrect"
        document.getElementById("errorId").classList.add("red");
        return false;

    } else {
   
        document.getElementById("errorId").innerHTML = ""
        document.getElementById("errorId").classList.remove("red");
    }
}