

let fichierImage=document.getElementById('fichierImage');
fichierImage.style.display="none";



let masqueMail = document.getElementById('affichemail');
masqueMail.style.display="none";


document.getElementById('envoyerMail').addEventListener('click', function (desactivationDeA)
{
    desactivationDeA.preventDefault();
    
        let mail2 = document.getElementById('affichemail');
        mail2.style.display="block";
        this.innerHTML="Masquer le mail";

});

document.getElementById('envoyerMail').addEventListener('dblclick', function (desactivationDeA)
{
    desactivationDeA.preventDefault();

    let mail = document.getElementById('affichemail');
    mail.style.display="none";
    this.innerHTML="Envoyer un mail";

});

    
    

let masqueCompte = document.getElementById('afficheCompte');
masqueCompte.style.display="none";

document.getElementById('creerCompte').addEventListener('mouseover', function ()
    {
        this.innerHTML="Masquer créer le compte";
        let compte = document.getElementById('afficheCompte');
        compte.style="display:block;";
    });


document.getElementById('creerCompte').addEventListener('click', function ()
    {
        let compte = document.getElementById('afficheCompte');
        compte.style.display="none";

    // this.innerHTML="Masquer le mail";
    });


