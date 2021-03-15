import React, {useReducer} from 'react';
//import ReactDOM from 'react-dom';
//import Content from './Components/Content';

//app.js

const initialState = 0;

function reducer(state, action) {
    switch (action) {
        case 'INCREMENTATION' :
            return state + 1;

        case 'DECREMENTATION' :
            return state - 1;

        case 'RESET' : 
            return initialState;
        
        default :
            return state;
    }
}

const Index = () => {

    //Attention : dispatch est relié à reducer et count à initialState
    const [count, dispatch] = useReducer(reducer, initialState)

    return(
        <div className="App">
            <h1>{count}</h1>
            <button onClick={()=>dispatch('INCREMENTATION')}>INCREMENTER</button>
            <button onClick={()=>dispatch('DECREMENTATION')}>DECREMENTER</button>
            <button onClick={()=>dispatch('RESET')}>INITIALISER</button>
        </div>
    )

}

export default Index;