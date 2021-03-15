import React from 'react'
import {useState} from 'react';

const AddTask = ({onAddTask}) => {

    const [text, setText]  = useState("");
    const [day, setDay]  = useState("");
    const [reminder, setReminder]  = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();
        if (!text) {
            alert('Entrez une tâche')
            return
        }

        //Appel de la fonction dans app.js pour ajouter une tâche
        onAddTask({text, day, reminder})

        //Je réinitliase mes champs après ca : 
        setText('');
        setDay('');
        setReminder(false);
    }


    return (
        <form className="form-control" onSubmit={handleSubmit}>
            <div className="form-control">
                <label>Task</label>
                <input type="text" value={text} onChange={(e)=>setText(e.target.value)} placeholder="your task"/>
            </div>

            <div className="form-control">
                <label>Day & time</label>
                <input type="text" value={day} onChange={(e)=>setDay(e.target.value)}placeholder="Day & Time"/>

                <div className="form-control form-control-check">
                    <label>Set reminder</label>
                    <input type="checkbox" checked={reminder} onChange={(e)=>setReminder(e.target.checked)}/>

                </div>

                <input type="submit" value="Add task" className="btn btn-block"/>

            </div>

        </form>
    )
}



export default AddTask;