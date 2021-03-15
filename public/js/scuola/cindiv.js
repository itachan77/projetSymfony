            
        //SCRIPT POUR LA GESTION DU SLIDE 
            
            // $(document).ready(function(){}) // cette ligne permet de déclencher notre code une fois que le document est entièrement chargé.
            $(document).ready(function(){

                $('#modal-image').hide();
                $('#ma_modal').hide();

                // 
                //$('.monSliderSlick img').on('click', function () {
                $('.monSliderSlick img').click( function() {    
                    console.log($(this).attr('src'));
                    $('#modal-image img').attr('src', $(this).attr('src'))
                    $('#modal-image').show(1000);
                    $('#ma_modal').show();
                });

                // rajoutez un element (icone par exemple) dans la modal permettant de la fermer.
                // + evenement click qui cache la modal 
                $('#modal-image i').on('click', function () {
                    $('#modal-image').hide(1000);
                    $('#ma_modal').slideUp(1000);
                });


                // lancement & parametrage du slider slick
                // https://plugins.jquery.com/slick/
                // https://github.com/kenwheeler/slick-
                // http://kenwheeler.github.io/slick/

                $('.monSliderSlick').slick({
                    autoplay: true, // défilement automatique
                    // adaptiveHeight: true,
                    dots: true, // on affiche les puces
                    slidesToShow: 3, // le nombre de slide à montrer
                    // slidesToScroll: 3, // le nombre de slide à déplacer lors du click sur la fleche
                    prevArrow: $('#prev'),
                    nextArrow: $('#next'),
                    // responsive permet de donner des breakpoint pour changer les parametres du slider.
                    responsive: [ {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    } ]
    
                    
                });


            }); // FIN DOCUMENT READY

        //SCRIPT POUR LA GESTION DES MODIFICATIONS ATTRIBUEES AU ROLE ADMIN

        
        let boite_ajout = document.getElementById('boite_ajout');
        boite_ajout.style.display="none";

        let bouton_masquer = document.getElementById('masquer');
        bouton_masquer.style.display="none";


        // ce qu'il se passe quand on clique sur le bouton modifier
        document.getElementById('modifier').addEventListener('click', function() {
        let boite_ajout = document.getElementById('boite_ajout');
        boite_ajout.style.display="block";

        let bouton_ajout = document.getElementById('modifier');
        bouton_ajout.style.display="none";

        let bouton_masquer = document.getElementById('masquer');
        bouton_masquer.style.display="block";

        });


        // ce qu'il se passe quand on clique sur le bouton masquer
        document.getElementById('masquer').addEventListener('click', function() {
            let boite_ajout = document.getElementById('boite_ajout');
            boite_ajout.style.display="none";
            
            let bouton_ajout = document.getElementById('modifier');
            bouton_ajout.style.display="block";
            
            let bouton_masquer = document.getElementById('masquer');
            bouton_masquer.style.display="none";
            
            });
