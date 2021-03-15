import React, {useState, useMemo, useCallback} from 'react';
import Contchild from './Contchild';

    //sans mettre React.memo dans l'enfant, l'état de l'enfant change aussi. On peut le voir car le console.log
    // de l'enfant se met à jour à chaque mise à jour de ce fichier. 

const Content = () => {

    //fonction : setCounter('ma modification')
    const [counter, setCounter] = useState(0);

    //tout ce qui est primitif (ex:string, entier) n'a pas d'incidence sur l'effet du react.memo
    //par contre, le react.memo ne fonctionne plus quand le props est un tableau.
    //pour y remédier, on utilise useMemo, fonction native de React (toute celles en fait
    //qui commencent par use) qu'on doit mettre dans une variable (tab), à l'intérieur
    //duquel on doit mettre notre tableau suivi d'un [] vide, pour que l'effet de rechargement 
    //ne fonctionne plus

    const tab = useMemo(()=>{
        const tab = [1,2,3];
    },[])

    //si la fonction est laissée telle quel, notre tab d'avant revient au meme problème.
    //puisque à l'intérieur, nous avons une fonction et non un tableau, il faut cette 
    //fois ci utiliser useCallBack

        // const fonc = () => {
        //     console.log("hit")
        // }
    //il faut donc pour la fonction fonc utiliser useCallback
    const fonc = useCallback(() => {
        console.log("hit")
    },[])
    


    return (
        <div>
            <h1>Le Parent</h1>
            <p>{counter}</p>
            <button onClick={()=>{setCounter(counter+1)}}>Clique sur moi</button>
            <Contchild info={tab} myFunc={fonc}/>
        </div>
    )

}

export default Content
