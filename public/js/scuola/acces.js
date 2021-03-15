let map = document.getElementById('map');
let bus615= document.getElementById('bus615');
let bus1= document.getElementById('bus1');
let adresses= document.getElementById('adresses');

bus615.style.display="none";


    bus1.addEventListener('click', function() {
        map.style.display="none";
        bus615.style.display="block";
    });

    adresses.addEventListener('click', function() {
        bus615.style.display="none";
        map.style.display="block";
        
    });
