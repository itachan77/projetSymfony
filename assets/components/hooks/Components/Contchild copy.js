import React from 'react'

const Contchild = (props) => {
    console.log("Composant mis à jour");

    return (
        <div>
            <h2>Je suis l'enfant</h2>
            <p>{props.info}</p>
            <button onClick={props.myFunc}>Ma console  s'affiche</button>
        </div>
    )
}
    //sans mettre React.memo dans l'enfant, l'état de l'enfant change aussi. On peut le voir car le console.log
    // de l'enfant se met à jour à chaque mise à jour de ce fichier. 
export default React.memo(Contchild)