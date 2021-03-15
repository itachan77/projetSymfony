
let menuComplet = document.getElementById('menuComplet');
let menuReduit = document.getElementById('menuReduit');
let menuImgTitre = document.getElementById('menuImgTitre');
let sand = document.getElementById('sand');
let doigt = document.getElementById('doigt');
let sandVue = document.getElementById('sandVue');
let doigtVue = document.getElementById('doigtVue');


let sand2 = document.getElementById('sand2');
let doigt2 = document.getElementById('doigt2');
let sandVue2 = document.getElementById('sandVue2');
let doigtVue2 = document.getElementById('doigtVue2');
let permMenu2=document.getElementById('permMenu2');
let profil = document.getElementById('profil');
let sousProfil = document.getElementById('sousProfil');





//gain de temps énorme. Quand j'ai le temps, changer avec jquery pour tous 
//ces évènements d'ici
$("#sousProfil").hide();
$("#profil").on("click", function() {
var target = $(this).data("target");
if(target!==undefined) $(target).toggle();
});


//menu réduit caché
menuReduit.style.display="none";

//les deux fontawesome secondaire doivent être masqués pour pas qu'on en voit deux fois
sandVue.style.display="none";
doigtVue.style.display="none";


//je cache le permMenu petit (il ne doit apparaitre que lorsque le menu reduit est activé)
permMenu2.style.display="none";





sand.addEventListener('click',()=>{
    menuImgTitre.style.display="none";
    menuComplet.style.display="none";
    //en cachant sand, sandVue placé aussi dans le twig apparait
    sand.style.display="none";
    sandVue.style.display="block";
});



doigt.addEventListener('click',()=>{
    menuReduit.style.display="block";
    menuImgTitre.style.display="none";
    menuComplet.style.display="none";
    permMenu.style.display="none";
    permMenu2.style.display="block";
    sandVue2.style.display="none";
    doigt2.style.display="none";
});

doigtVue2.addEventListener('click',()=>{
    menuReduit.style.display="none";
    //en cachant doigt, sandVue placé aussi dans le twig apparait
    doigt.style.display="block";
    doigtVue2.style.display="none";
    doigt2.style.display="block";
});


//doigt2 est le doigt du petit menu
doigt2.addEventListener('click',()=>{
    menuReduit.style.display="block";
    menuImgTitre.style.display="none";
    menuComplet.style.display="none";
    permMenu.style.display="none";
    permMenu2.style.display="block";
    sandVue2.style.display="none";
    doigt2.style.display="none";
    doigtVue2.style.display="block";
});


sand2.addEventListener('click',()=>{
    permMenu.style.display="block";
    permMenu2.style.display="none";
    menuReduit.style.display="none";
    menuImgTitre.style.display="block";
    menuComplet.style.display="block";
    //en affichant sand, sandVue placé aussi dans le twig disparait
    sand.style.display="block";
    sandVue.style.display="none";
});


sandVue.addEventListener('click',()=>{
    menuReduit.style.display="none";
    menuImgTitre.style.display="block";
    menuComplet.style.display="block";
    //en affichant sand, sandVue placé aussi dans le twig disparait
    sand.style.display="block";
    sandVue.style.display="none";
});

doigtVue.addEventListener('click',()=>{
    menuReduit.style.display="none";
    //en cachant doigt, sandVue placé aussi dans le twig apparait
    doigt.style.display="block";
    doigtVue.style.display="none";
});





menuReduit.addEventListener('dblclick',()=>{
    menuComplet.style.display="block";
    menuReduit.style.display="none";
    Titre.style.display="block";
    
})

menuComplet.addEventListener('dblclick',()=>{
    Titre.style.display="none";
    menuComplet.style.display="none";
    menuReduit.style.display="block";
});






class oWdgCursor {
    constructor(sElement, sLimite) {
        this.oLimite = null;
        this.oElement = null;
        this.oLimite = document.getElementById(sLimite);
        this.bDrag = false;
        this.bError = false;
        this.sClassDrag = 'oWdgCursorDrag';
        this.oPos = { x: 0, y: 0 };
        this.moveDiv = this.moveDiv.bind(this);
        this.getBoundingLimite = function () {
            if (this.oLimite == document.documentElement) {
                return {
                    width: window.innerWidth,
                    height: window.innerHeight,
                    top: this.oLimite.offsetTop,
                    left: this.oLimite.offsetLeft
                };
            }
            return this.oLimite.getBoundingClientRect();
        };
        /**
        * Initialise les evenements
        */
        this.init = function (sLimite, sElement) {
            this.oElement = document.getElementById(sElement);
            this.oLimite = (sLimite === undefined) ? document.documentElement : document.getElementById(sLimite);
            if (this.oElement == null || this.oLimite == null) {
                return true;
            } //if
            this.oElement.addEventListener('mousedown', this.moveDiv);
            this.oElement.addEventListener('touchstart', this.moveDiv);
            return false;
        }; //fct 

        this.bError = this.init(sLimite, sElement);
    }
    moveDiv(oEvent) {
        oEvent.preventDefault();
        if (oEvent.type == "touchstart" || oEvent.type == "mousedown") {
            this.bDrag = true;
            var oTouch = oEvent,
                oRect = this.oElement.getBoundingClientRect();
            if (oEvent.type == "touchstart") {
                oTouch = null;
                if (oEvent.targetTouches.length > 0) {
                    for (var i = 0; i < oEvent.targetTouches.length; i++) {
                        if (oEvent.targetTouches[i].target == this.oElement) {
                            oTouch = oEvent.targetTouches[i];
                            break;
                        } //if
                    } //for
                } //if
                if (oTouch == null) { return; }
            } //if
            this.oPos = { 'left': (oTouch.clientX - oRect.left), 'top': (oTouch.clientY - oRect.top) };
            document.addEventListener('mouseup', this.moveDiv);
            this.oElement.addEventListener('mouseup', this.moveDiv);
            document.addEventListener('touchend', this.moveDiv);

            document.addEventListener('mousemove', this.moveDiv);
            document.addEventListener('touchmove', this.moveDiv);
        } else if (oEvent.type == "touchend" || oEvent.type == "mouseup") {
            this.bDrag = false;
            this.oElement.classList.remove(this.sClassDrag);
            document.removeEventListener('mousemove', this.moveDiv);
            document.removeEventListener('touchmove', this.moveDiv);
            document.removeEventListener('mouseup', this.moveDiv);
            document.removeEventListener('touchend', this.moveDiv);
            this.oElement.removeEventListener('mouseup', this.moveDiv);
        } else if (oEvent.type == "touchmove" || oEvent.type == "mousemove") {
            var oTouch = oEvent;

            if (oEvent.type == "touchmove") {
                oTouch = null;
                if (oEvent.targetTouches.length > 0) {
                    for (var i = 0; i < oEvent.targetTouches.length; i++) {
                        if (oEvent.targetTouches[i].target == this.oElement) {
                            oTouch = oEvent.targetTouches[i];
                            break;
                        } //if
                    } //for
                } //if
                if (oTouch == null) { return; }
            } //if
            if (this.bDrag == true) {
                this.oElement.classList.add(this.sClassDrag);
                var oRect = this.getBoundingLimite(),
                    iWidth = this.oElement.offsetWidth,
                    iHeight = this.oElement.offsetHeight,
                    iClientX = oTouch.clientX - oRect.left - this.oPos.left,
                    iClientY = oTouch.clientY - oRect.top - this.oPos.top;
                if (iClientX < 0) {
                    iClientX = 0;
                } else if (iClientX + iWidth > oRect.width) {
                    iClientX = oRect.width - iWidth;
                }
                if (iClientY < 0) {
                    iClientY = 0;
                } else if (iClientY + iHeight > oRect.height) {
                    iClientY = oRect.height - iHeight;
                }
                this.oElement.style.left = iClientX + 'px';
                this.oElement.style.top = iClientY + 'px';
            } //if
            else {
                this.oElement.classList.remove(this.sClassDrag);
            }
        } //else if
    }
}//fct


document.addEventListener('DOMContentLoaded',function(){
    //  var oZone1 = new oWdgCursor('cible','rectlimit');  
    var oZone2 = new oWdgCursor('menuReduit'); 
    //var oZone2 = new oWdgCursor('menuComplet'); 
    //var oZone2 = new oWdgCursor('cible'); 
    //var oZone1 = new oWdgCursor('cible2'); 
});




