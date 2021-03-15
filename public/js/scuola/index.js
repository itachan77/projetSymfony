let titre=document.getElementById('titre_accueil');
let bienvenue=document.getElementById('bienvenue');
let bienvenue1=document.getElementById('bienvenue1');
let bienvenue2=document.getElementById('bienvenue2');
let ecole=document.getElementById('ecole');
let mess="BIENVENUE SUR LE SITE DE LA SCUOLA";
let mess2="BIENVENUE SUR LE SITE DE LA SCUOLA";
let adresse1=document.getElementById('adresse1');
let adresse2=document.getElementById('adresse2');


bienvenue.style.cssText+="font-size:60px;font-weight:bold;color:white;color:black;";
bienvenue.style.cssText+="transform:translate(500px, 10px);";
bienvenue.style.cssText+="opacity:0;";
bienvenue.style.cssText+="transition:5s";

bienvenue.style.cssText+="transform:translate(0px, 10px);";
bienvenue.innerHTML=mess;


bienvenue1.style.cssText+="text-align:right;font-size:60px;font-weight:bold;color:white;color:black;";
bienvenue1.style.cssText+="transform:translate(-500px, -10px);";
bienvenue1.style.cssText+="opacity:0;";
bienvenue1.style.cssText+="transition:5s";
bienvenue1.innerHTML=mess;







ecole.style.cssText+="font-size:25px;font-weight:bold;color:yellow;color:burlywood;;text-align:left;text-align:center;";
ecole.style.cssText+="transition-delay:3s;transition:4s";
ecole.innerHTML+='<span>Ecole de musique </span><i class="fas fa-guitar"></i><i class="fas fa-drum"></i><i class="fas fa-music"></i>';


function adres1()
{

adresse1.style.cssText+="text-align:center";
adresse1.innerHTML="48 boulevard de Strasbourg";
}
setTimeout(adres1,5000);

function adres2()
{
adresse2.style.cssText+="text-align:center";
adresse2.innerHTML="93600 AULNAY-SOUS-BOIS";
}
setTimeout(adres2,5500);

function bienv2()
{

bienvenue2.style.cssText+="margin-top:-150px!important;font-size:60px;font-weight:bold;color:black;text-align:center;padding:7px;";
bienvenue2.innerHTML+='<span style="transition:1s;opacity:1">'+mess2+'</span>';
}
setTimeout(bienv2,3500);

/************************************SUPRESSION DES SLIDES************************** */

let blocSupp = document.getElementById('blocSupp');
let btnSupprimer = document.getElementById('btnSupprimer');

let btnMasquerSupp = document.getElementById('btnMasquerSupp');
btnMasquerSupp.style.display="none";

blocSupp.style.display="none";

btnSupprimer.addEventListener('click', function(a) {
a.preventDefault;
blocSupp.style.display="block";
btnSupprimer.style.display="none";
btnMasquerSupp.style.display="block";


});

btnMasquerSupp.addEventListener('click', function(a) {
    a.preventDefault;
    blocSupp.style.display="none";
    btnMasquerSupp.style.display="none";
    btnSupprimer.style.display="block";
    
    });





/*
// 1 evenement mouseleave pour bloquer le setInterval
document.getElementById('blocImage1').addEventListener('mouseenter', function () {
    clearInterval(animationCarousel); // permet d'annuler le setInterval
});

// 1 evenement mouseenter pour relancer le setInterval
document.getElementById('blocImage1').addEventListener('mouseleave', function () {
    animationCarousel = setInterval(activeCarousel, 3000); // permet de relancer un setInterval
});
*/

















































/**********************************CAROUSEL*********************************** */
/*
let blocImages = document.getElementById('but');

blocImages.addEventListener('click', activeCarousel);

function activeCarousel() {

    //pour une question de rendu dynamique, je nomme mon attribut data-image en chiffre que je convertis, 
    //chiffre string que je convertis en int
    //en valeur 
imageEnCours=document.getElementById('blocImage1').getAttribute('data-image');

let imageNext=parseInt(imageEnCours) + 1;

    //je récupère toutes mes images de slide en utilisant queryselectorAll

let imageCarousel = document.querySelectorAll('#blocImage1 img');

//si le tableau img contient des images imageCarousel[0], imageCarousel[1],(imageCarousel.length revient à dire vrai
// car rappelons que vrai est 1 et plus)
if (imageCarousel.length) {

// alors si la valeur de l'attribut data-image (à qui nous avons attribué un chiffre dans le html)
// est égale à la taille du tableau (valeur toujours fixe) (ex:taille d'un tableau : 6 images)
// c'est que nous sommes à la fin de l'image. (on met moins 1 car un tableau commence par [0])

    if(imageEnCours==imageCarousel.length - 1) {
        //alors imageNext a une valeur de 0 pour revenir au début car on est arrivé à la fin
        imageNext=0;
    }
        //imageCarousel[imageNext] correspond à la valeur d'une image concrete
        imageCarousel[imageEnCours].style.opacity = 0;
        imageCarousel[imageNext].style.opacity = 1;
        imageCarousel[imageNext].style.transition = "4s";

        document.getElementById('blocImage1').setAttribute('data-image', imageNext);
}

};

let animationCarousel = setInterval(activeCarousel, 4000);
*/