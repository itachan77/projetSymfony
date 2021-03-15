$("#lprofesseur").hide();
$("#professeur").on("click", function() {
    var target = $(this).data("target");
    if(target!==undefined) $(target).toggle();
    });


$("#lutilisateur").hide();
$("#utilisateur").on("click", function() {
    var target = $(this).data("target");
    if(target!==undefined) $(target).toggle();
    });


$("#leleve").hide();
$("#eleve").on("click", function() {
    var target = $(this).data("target");
    if(target!==undefined) $(target).toggle();
    });
    