let widgetPh = document.getElementById('widgetPh');
widgetPh.style.display="none";

let widgetUn = document.getElementById('widgetUn');
widgetUn.style.display="none";

let widgetPwd = document.getElementById('widgetPwd');
transPassword=widgetPwd.querySelector('input');
transPassword.setAttribute('type','password');

widgetPwd.style.display="none";



let spanOeil=document.getElementById('spanOeil');



let widgetDs = document.querySelector("#widgetDs")
widgetDs.style.display="none";



let widgetPhBtn = document.getElementById('widgetPhBtn');
widgetPhBtn.addEventListener('click', ()=>{
    widgetPh.style.display="block";
    widgetPhBtn.style.display="none";
})

let widgetUnBtn = document.getElementById('widgetUnBtn');
widgetUnBtn.addEventListener('click', ()=>{
    widgetUn.style.display="block";
    widgetUnBtn.style.display="none";
})


let widgetDsBtn = document.getElementById('widgetDsBtn');
widgetDsBtn.addEventListener('click', ()=>{
    widgetDs.style.display="block";
    widgetDsBtn.style.display="none";
})

let widgetPwdBtn = document.getElementById('widgetPwdBtn');
widgetPwdBtn.addEventListener('click', ()=>{
    widgetPwd.style.display="block";
    widgetPwdBtn.style.display="none";
})