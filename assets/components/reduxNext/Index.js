import React from 'react';
import Compteur from './Compteur/Compteur';
import {createStore} from 'redux';
import reducer from './Store/reducer';

//app.js


const store = createStore(reducer);

function Index() {
    return (
    <div className="App">
        <Compteur store={store}/>
    </div>
    );
}



export default Index;

