import React from 'react';
import {useState} from 'react';


const Ajouter = ({surMonadd}) => {
    const [nom, setnom] = useState("");
    const [prenom, setprenom] = useState("");
    const [email, setemail] = useState("");

    const monSubmit = (e) => {
        
        
        e.preventDefault(); 
        surMonadd({nom, prenom, email});

        setnom('')
        setprenom('')
        setemail('')
    }


    return (
        <div>
                
                <form onSubmit={monSubmit}>

                <div>
                    <label htmlFor="nom">Nom : </label>
                    <input type="text" value={nom}  onChange={(e)=>setnom(e.target.value)}/></div>

                <div>
                    <label htmlFor="prenom">Prénom : </label>
                    <input type="text" value={prenom} onChange={(e)=>setprenom(e.target.value)}/></div>

                <div>
                    <label htmlFor="email">Email : </label>
                    <input type="text" value={email} onChange={(e)=>setemail(e.target.value)}/></div>

                <input type="submit" value="AJOUTER"/>

                </form>
        </div>
    )
}


export default Ajouter
