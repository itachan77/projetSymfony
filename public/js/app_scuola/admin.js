
//Gestion de l'ajax sur les villes et codes postaux
$("document").ready(function() 
{
    $('.cp').on('blur', function(){
        let maval = parseInt($(this).val());

        if (maval == maval) {
            $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/admin/maville/' + $(this).val(),

                beforeSend:function() {
                    console.log("ca charge");
                },

                success:function(data){
                        $('.ville').val(data.cp+' '+data.ville.toUpperCase());
                        console.log('ville ok');
                }
            });
        }
    })
});








/*
$(".cp").mouseout(function() {
    if ($(this).val().lenght==5) {
        console.log('okok');
    }
    else 
    console.log($(this).val());
});
*/
if (document.getElementById("fichierImage"))
{
    let fichierImage=document.getElementById('fichierImage');
    fichierImage.style.display="none";
}




