//pages des cours


let coursAll = document.querySelectorAll('.coursAlld');
let coursDetail = document.getElementById('coursDetail');
let ii = document.querySelectorAll('.vide');
let classh1 = document.querySelectorAll('a[class="h1"]');


//transforme le cursor en doigt pour chaque div de class .coursAlld
for (a=0;a<coursAll.length;a++) {
    coursAll[a].style="cursor:pointer";
}


for (i=0;i<coursAll.length;i++) {

    coursAll[i].addEventListener('click',function() {
        coursDetail.style.display="none";
        //cherche l'attribut class en cours dans l'élémenet i et remplace la valeur (.vide) par 
        //un fontawesome +
        ii[0].setAttribute('class','fas fa-plus ml-5 mr-3')
        //cherche l'attribut class en cours dans l'élément a et remplace la valeur h1 par une valeur vide
        //pour que le h1 disparaisse
        classh1[0].setAttribute('class','')
        //cherche l'attribut class en cours dans l'élément div et remplace la valeur "coursAlld text-center"
        //par seulement la valeur coursAlld pour que le text-center ne fasse plus effet
        coursAll[0].setAttribute('class','coursAlld text-left');
        console.log(coursAll[0])
    })




}
