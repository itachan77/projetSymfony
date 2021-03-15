//useEffect est comme le componentDidMount
import React, {useEffect, useState} from 'react';



    const Content = () => {
        
        //console.log(useState(1));
        //useState fonction native permet de modifier le nom de notre state (ex:myState) et le nom de sa modificcation (ex:setMyState)
        //il peut y avoir beaucoup d'autres hooks
        //ces hooks doivent toujours être mis à la racine
        const [myState, setMyState] = useState();
        const [tabAfpa, setTabAfpa] = useState();

        /*
        0: {breeds: [], id: "349", url: "https://cdn2.thecatapi.com/images/349.gif", width: 500, height: 281}
        breeds: []
        height: 281
        id: "349"
        url: "https://cdn2.thecatapi.com/images/349.gif"
        width: 500
        */

        //la méthode native useEffect permet de s'exécuter une fois qu'il y a un changement de 
        //state (fait le update aussi)
        //[]signifie qu'on entre dans une boucle vide
        //[myState]fait le tour du tableau donc fait automatiquement dans le tableau 0,1,2,3,4...
        //fait un componentdidmount  une première fois et ensuite, fait un update1 ... update2
        useEffect ( () => {
            const recupData = async () => {
                //const res = await fetch('https://api.thecatapi.com/v1/images/search');
                const res = await fetch('https://etablissements-publics.api.gouv.fr/v3/departements/93/afpa');
                
                //faire une transformation en json : 
                const data = await res.json();
                console.log(data);

                setMyState(data.features[0].geometry.coordinates[0]);
            }
            recupData();
        }, [myState])



        return (
            <div>
                {/* <img src={myState} alt="" width="25%"/> */}

                <p>Latitude : {myState}</p>
                <p>state original : {tabAfpa}</p>

            </div>
        )

    }

export default Content;