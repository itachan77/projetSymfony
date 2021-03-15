// var btnPopup = document.getElementById('btnPopup');
// var dataModal = document.getElementById('dataModal');


//Attention, il semble que les fonctions hide et show ne fonctionne bien que sur les class et pas sur les id


//Le overlay (le fond transparent centré en fixed) et donc le popup qui est dedans est caché.

$(".overlay").hide();


$(document).ready(function () {

    //Au clic sur le bouton .btn-bold que je suis obligée de mettre en parent du overlay pour que le this (donc pour que 
    //chaque email soit affiché) fonctionne, .btn-bold va trouver son enfant .overlay et va l'afficher (enfant vers parent 
    //ne marche pas pour un effet this) 

    $('.btn-js').click(function () {
        //trouvé moi-meme. on doit passer par this pour que chaque email différent soit affiché donc
        //this.find et pas $('.btn-bold').show()

        $(this).find('.overlay').show();

    });



    $('.overlay .fa-times').click(function () {

        //fermeture compliquée (difficulté parent/enfant (en effet, compliqué de mettre en parent .fa-times et en 
        //enfant .overlay)). Par exemple, $(".overlay").hide() ne marche pas.
        //Je décide donc qu'au clic sur la croix, 
        //la page soit rechargée pour enlever le popup.
        document.location.reload();
    });

});


