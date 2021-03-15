import React from 'react';
import { FaTimes} from 'react-icons/fa'

const Task = ({toto, masup, onToggle}) => {


    return (
        <div className={`task ${toto.reminder ? 'reminder' : ''}`} onDoubleClick={()=>onToggle(toto.id)}>
                    {/* React a besoin d'identifier les différents composant du virtual DOM pour
                    pourvoir gérer les states ce pourquoi on ajoute un identifiant à nos H3 */}
            <h3>{toto.text} <FaTimes style={{color:"red", cursor:"pointer"}} onClick={()=>masup(toto.id)}/></h3>
            <p>{toto.day}</p>

        </div>

        

    )
}

export default Task;
