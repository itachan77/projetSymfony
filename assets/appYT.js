import IndexTube from './components/video/Index.js';
import './styles/app.scss';
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';

//index.js
/*
const apiChat = () => {
    ReactDOM.render(
    <Index />,document.getElementById('root')
    );
}
apiChat();
*/

/*
const myUser = document.getElementById('myUser');

const starting = myUser.dataset.elevesjson;
console.log("contenu du starting : " + starting);
const monatt = myUser.getAttribute('data-users');

const monattp = JSON.parse(myUser.getAttribute('data-users'));

console.log("dans le jsonparse : " + myUser.getAttribute('data-users'));
console.log("monattp parsé :" + monattp);



for (var obj in monatt) {
    myUser.innerHTML += monatt[obj] + "->" +
    monatt[obj] + "km/h <hr>";
}
*/

    ReactDOM.render(
    <IndexTube/>,document.getElementById('root')
    );
