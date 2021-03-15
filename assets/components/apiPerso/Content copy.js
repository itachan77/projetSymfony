//useEffect est comme le componentDidMount
import React, {useEffect, useState} from 'react';

const Content = () => {
    
    //console.log(useState(1));

    //useState fonction native permet de modifier le nom de notre state (ex:myState) et le nom de sa modificcation (ex:setMyState)
    //il peut y avoir beaucoup d'autres hooks
    //ces hooks doivent toujours être mis à la racine
    const [myState, setMyState] = useState("ETAT INITIAL DE MYSTATE");
    const [monautreState,setmonautreState] = useState("ETAT DE MON 2EME MYSTATE");

    const changeState = () => {
        setMyState('CHANGEMENT DE MYSTATE');
    }
    const changeAutreState = () => {
        setmonautreState('CHANGEMENT DE MON AUTRE MYSTATE');
    }

    //la méthode native useEffect permet de s'exécuter une fois qu'il y a un changement de state (fait le update aussi)
    useEffect ( () => {
        console.log("le composant a changé")
        
    }, [monautreState])

    return (
        <div>
            <button onClick={changeState}>clique sur moi premier state</button>
            <button onClick={changeAutreState}>clique sur moi autre state</button>
            <p>
                {myState}
            </p>

            <p>
                {monautreState}
            </p>

        </div>
    )

}

export default Content;