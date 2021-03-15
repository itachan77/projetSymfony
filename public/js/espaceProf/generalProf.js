//Fichier generalProf.js se trouve dans le header pour la gestion du js de 
//tout l'espace professeur

//gain de temps énorme. Quand j'ai le temps, changer avec jquery pour tous 
//ces évènements d'ici


$("#formCard #corps").hide();
$("#formCard #entete").on("click", function() {
var target = $(this).data("target");
if(target!==undefined) $(target).toggle();
});

$("#formCardSup #corpsSup").hide();
$("#formCardSup #enteteSup").on("click", function() {
var target = $(this).data("target");
if(target!==undefined) $(target).toggle();
});



//Au chargement de la page
$(document).ready(function()
{
        //je récupère l'id checkbox
//        var check = $("#check");

        //sur click de la croix de suppression
        $(".fa-times").click(function() {
                    //si la case a cocher est cochée
                        if(this.click) {
                        console.log('cliqué');

                        //$(this).find(".fa-times");
                        $(this).css('display','none');
                        
                        var monclick = $(this).attr("data-suppression"); //this très très important pour que le
                        //lien concerné soit choisi.
                        console.log(monclick);
                        
                        //si utilisation de la deuxième facon d'utiliser le chemin qui sélectionne, je détermine
                        //une variable path qui aura comme valeur le nom de la route qui effectue la tâche de sélection d'un éléve
                        //c'est à dire la route sélection de Admincontroller(ligne 505) pour la liste des élèves
                        //ou ProfAdController(ligne 329) pour la liste des professeurs
                        $.ajax(
                        {
                                type:'get',
                                //première facon de faire mention au chemin que je souhaite utiliser
                                //url:'/admin/selection/' + this.getAttribute('data-id'),
                                //url:'/professeur/selection/' + this.getAttribute('data-id'),

                                //deuxième facon de faire mention au chemin que je souhaite utiliser
                                url:monclick,
                                
                                beforeSend:function() 
                                {
                                        
                                        console.log("ca charge");
                                },
                                
                                success:function(data)  
                                {
                                        console.log('processus achevé')
                                }
                                
                        });
                    }
                    
        });

})
