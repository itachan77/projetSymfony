
let profAll = document.querySelectorAll('.profAlld');
let profDetail = document.getElementById('profDetail');
let ii = document.querySelectorAll('.fa-minus');
let ahref = document.querySelectorAll('a[href=""]');


//transforme le cursor en doigt pour chaque div de class .profAlld
for (a=0;a<profAll.length;a++) {
    profAll[a].style="cursor:pointer";
    ahref[0].setAttribute('title','')
}


for (i=0;i<profAll.length;i++) {

    profAll[i].addEventListener('click',function() {
        
        profDetail.style.display="none";
        ii[0].setAttribute('class','fas fa-plus ml-5 mr-3')
        ahref[0].setAttribute('class','')
        
    })




}

