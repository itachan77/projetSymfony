let nom=document.getElementById('nom');
let prenom=document.getElementById('prenom');
let email=document.getElementById('email');
let message=document.getElementById('contact_messageContact');
let indic=document.getElementById('indic');

let mesInput=document.getElementsByTagName('input');
let mesLabels=document.getElementsByTagName('label');

for (let i=0;i<mesInput.length;i++)
{
    mesInput[i].addEventListener('focus', function() {
        indic.style.cssText="background-color:rgb(212,237,218);font-weight:bold;font-size:20px;";
        indic.innerHTML="Veuillez saisir " +mesLabels[i+1].textContent.toLowerCase();
    });
}
for (let i=0;i<mesInput.length;i++)
{
    mesInput[i].addEventListener('mouseover', function() {
        indic.style.cssText="background-color:rgb(212,237,218);font-weight:bold;font-size:20px;";
        indic.innerHTML="Veuillez saisir " +mesLabels[i+1].textContent.toLowerCase();
    });
}
for (let n=0;n<mesInput.length;n++)
{
    mesInput[n].addEventListener('mouseout', function() {
        indic.style.cssText="background-color:white;";
        indic.innerHTML="";
    });
}




message.addEventListener('focus', function() {
    indic.style.cssText="background-color:rgb(212,237,218);font-weight:bold;font-size:20px;";
    indic.innerHTML="Veuillez rentrer votre message";
});
message.addEventListener('mouseover', function() {
    indic.style.cssText="background-color:rgb(212,237,218);font-weight:bold;font-size:20px;";
    indic.innerHTML="Veuillez rentrer votre message";
});
message.addEventListener('mouseout', function() {
    indic.style.cssText="background-color:white;";
    indic.innerHTML="";
});