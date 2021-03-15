
import React from 'react';
import Header from './Header';
import Tasks from './Tasks';
import {useState} from 'react';
import AddTask from './AddTask';

//app.js


function Index() {
    const text ="Todo List";

    //méthode permettant de gérer le toglle de l'affichage du formulaire d'ajout de tâche
    const [showAddTask, setShowAddTask] = useState(true);

//On utilise useState pour que la liste fasse partie intégrante du state du composant. 
//On ne pourra pas utiliser la méthode push quand on veut ajouter une tâche car le state ne se 
//modifie pas. Il faut lui réaffecter uen valeur.
//On va donc ajouter uen fonction setTasks si on veut modifier la liste

const [list0fTasks,setTasks]=useState(
    [
        {
        id:1,
        text:"Aller voir le médecin",
        day:"Vendredi 05 Mars",
        reminder:false
        },
        {
        id:2,
        text:"Manger chez Tata",
        day:"Samedi 24 Avril",
        reminder:false
        },
        {
        id:3,
        text:"Emmener le chien chez le vétérinaire",
        day:"Mardi 22 mai",
        reminder:true
        },
    ]
    )

    const supp = (id) => {
        
        setTasks(
        list0fTasks.filter(task =>
        task.id !== id)
        )
        //console.log('matata')
    }

    const toggleReminder = (id) => {
        console.log(id);
        setTasks(
            list0fTasks.map(
                (toto)=>
                toto.id === id ? {...toto, reminder : !toto.reminder} : toto
            )
        )
    }

    const addTask = (task) => {
        //console.log(task);
        const id = Math.floor(Math.random() * 100000) + 4
        
        //ici je copie l'objet task en luli ajoutant une clef id avec l'iid généré au dessus
        const newTask = {id,...task}

        setTasks(
            [...list0fTasks, newTask]
        )
    }

    return (
        <div className="container">
            <Header title={text} onAddTask={()=>setShowAddTask(!showAddTask)} showAddTask={showAddTask}/>

            {/* expression ternaire sans else */}
            {/* Si  showAddTask === true alors l'affiche de mon formulaire sinon non */}
            {showAddTask && <AddTask onAddTask={addTask}/>}
            
            
            { list0fTasks.length > 0 ? (<Tasks onToggle={toggleReminder} Tasks={list0fTasks} masup={supp}/>) :'Tableau vide'}

        </div>
    );
}

export default Index;
