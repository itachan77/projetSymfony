import React from 'react'
import Task from './Task'



const Tasks = ({Tasks, masup, onToggle}) => {

    return (
        <>
        {/* React a besoin d'identifier les différents composant du virtual DOM pour
        pourvoir gérer les states ce pourquoi on ajoute un identifiant à nos H3 */}

        {Tasks.map(
            (toto)=>(<Task  onToggle={onToggle} masup={masup}  key={toto.id} toto={toto}/>)
        )}
        </>
    )
}

export default Tasks

