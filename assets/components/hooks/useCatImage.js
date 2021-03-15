//useEffect est comme le componentDidMount
import React, {useEffect, useState} from 'react';


const useCatImage = () => {
    
    //il peut y avoir beaucoup d'autres hooks
    //ces hooks doivent toujours être mis à la racine
    const [myState, setMyState] = useState();



        /*
        0: {breeds: [], id: "349", url: "https://cdn2.thecatapi.com/images/349.gif", width: 500, height: 281}
        breeds: []
        height: 281
        id: "349"
        url: "https://cdn2.thecatapi.com/images/349.gif"
        width: 500
        */
    
    useEffect ( () => {
        const recupData = async () => {
            const res = await fetch('https://api.thecatapi.com/v1/images/search');
            //const res = await fetch('https://etablissements-publics.api.gouv.fr/v3/departements/93/afpa');
            
            //faire une transformation en json : 
            const data = await res.json();
            console.log(data);

            setMyState(data[0].url);
            console.log(data);
        }
        recupData();
    }, [])

    return myState
}

export default useCatImage