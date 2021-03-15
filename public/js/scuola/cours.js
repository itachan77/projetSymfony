
let boite_ajout = document.getElementById('boite_ajout');
boite_ajout.style.display="none";

let bouton_masquer = document.getElementById('masquer');
bouton_masquer.style.display="none";


// ce qu'il se passe quand on clique sur le bouton ajouter
document.getElementById('ajouter').addEventListener('click', function() {
let boite_ajout = document.getElementById('boite_ajout');
boite_ajout.style.display="block";

let bouton_ajout = document.getElementById('ajouter');
bouton_ajout.style.display="none";

let bouton_masquer = document.getElementById('masquer');
bouton_masquer.style.display="block";

});


// ce qu'il se passe quand on clique sur le bouton masquer
document.getElementById('masquer').addEventListener('click', function() {
    let boite_ajout = document.getElementById('boite_ajout');
    boite_ajout.style.display="none";
    
    let bouton_ajout = document.getElementById('ajouter');
    bouton_ajout.style.display="block";
    
    let bouton_masquer = document.getElementById('masquer');
    bouton_masquer.style.display="none";
    
    });









