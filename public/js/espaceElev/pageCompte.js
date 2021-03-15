

let widgetUn = document.getElementById('widgetUn');
widgetUn.style.display="none";

let widgetPwd = document.getElementById('widgetPwd');
transPassword=widgetPwd.querySelector('input');
transPassword.setAttribute('type','password');

widgetPwd.style.display="none";



let widgetUnBtn = document.getElementById('widgetUnBtn');
widgetUnBtn.addEventListener('click', ()=>{
    widgetUn.style.display="block";
    widgetUnBtn.style.display="none";
})



let widgetPwdBtn = document.getElementById('widgetPwdBtn');
widgetPwdBtn.addEventListener('click', ()=>{
    widgetPwd.style.display="block";
    widgetPwdBtn.style.display="none";
})