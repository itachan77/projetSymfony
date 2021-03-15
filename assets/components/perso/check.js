import React from 'react'
import {useState} from 'react';

const Check = ({toto,monCheck,changeBool}) => {
    
    const [monJson, setmonJson]=useState([
        {
            "coche":false
        },
    ])

    const contraire = (coche) => {
    setmonJson(
        <div>coche:!monJson.coche</div>
    )

    console.log(coche)
    }


    
    return (
        <div>

        <input type="checkbox" onClick={()=>changeBool(toto.id)} onChange={()=>contraire(toto.coche)}  checked={toto.coche}/>
        
        </div>
    )

}

export default Check