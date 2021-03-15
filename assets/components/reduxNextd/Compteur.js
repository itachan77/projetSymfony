import React from 'react';
import {useSelector, useDispatch} from 'react-redux';




export default function Compteur() {

    const compteur = useSelector(state => state.compteur)
    const dispatch = useDispatch();

    const incrementeCount = () => {
        dispatch({
            type:'INCR'
        })
    }
    const decrementeCount = () => {
        dispatch({
            type:'DECR'
        })
    }

    return(
        <div>
            <h2>Compteur: {compteur}</h2>
            <button onClick={incrementeCount}>+</button>
            <button onClick={decrementeCount}>-</button>
        </div>
    )
}