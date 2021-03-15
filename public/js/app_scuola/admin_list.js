//Gestion de l'ajax sur le checkbox de la liste des élèves (côté admin)

/*let check = document.getElementById('check');

check.addEventListener('change', function() {
console.log('bien été checké');

});
*/


//Au chargement de la page
$(document).ready(function()
{
        //je récupère l'id checkbox
        var check = $("#check");
    mesInput = document.getElementsByTagName('input');

        //sur le onchange de la checkbox
        $("[name=checkName]").change(function()
        {
                    //si la case a cocher est cochée
                    if(this.checked)
                    {
                        console.log('checké');
                        
                        let monId = document.getElementById('monId');

                        var checke = $(this).attr("data-check"); //this très très important pour que le
                        //lien concerné soit choisi.

                        
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
                                    url:checke,
                                    
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

                    else
                    {
                        
                        console.log('DEchecké');
                        //la variable decheck fait le contraire (active la route deselection 
                        //de Admincontroller (ligne 528)) ou ProfAdController(ligne 351) pour la liste des professeurs
                        
                        var dechecke = $(this).attr("data-decheck");

                        $.ajax(
                            {

                                type:'get',

                                //url:'/admin/deselection/' + this.getAttribute('data-id'),
                                url:dechecke,

                                beforeSend:function() 
                                    {
                                        console.log("ca charge");
                                    },
                                success:function(data)  
                                    {
                                        
                                        console.log('déselection achevée');
                                    }
                            });

                        $("#idCheckAll").attr("checked",false);
                    } 

                    
        });



        //input checkbox pour toutes les coches

        $("[name=checkAll]").change(function()
        {
                    //si la case a cocher est cochée
                    if(this.checked)
                    {
                        //alors 'checké' s'écrit dans la console
                        console.log('checké');
                        
                        //alors execute le path indiqué dans l'attribut data-checke
                        var check = $(this).attr("data-checke");

                        //alors tous les checkbox sont cochés
                        $("input").attr("checked",true);

                        console.log(check);

                            $.ajax(
                            {
                                    type:'get',
                                    url:check,
                                    
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

                    else
                    {
                        console.log('Déchecké');
                        var decheck = $(this).attr("data-dechecke");
                        $("input").attr("checked",false);

                        $.ajax(
                            {
                                type:'get',
                                url:decheck,
                                beforeSend:function() 
                                    {
                                        console.log("ca charge");
                                    },
                                success:function(data)  
                                    {
                                        
                                        console.log('déselection achevée');
                                    }
                            });
                    } 
        });

});