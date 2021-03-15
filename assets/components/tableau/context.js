import React, {Component} from 'react'

const Context = React.createContext();


const reducer = (state, action) => {
    
    switch(action.type) {
        case 'DELETE_TASK' :
            return {
                DataTasks: state.DataTasks.filter(task =>
                    task.id !== action.payload)
            };

        case 'ADD_TASK' :
            return {
                //rajoute les infos qu'on a entré dans notreinput pour les rajouter au tableau state existant. ce qui est rajouté correspond à action.payload qui est une propriété à définir dans les autres composants enfants
                //et qui correspond ici (ici mais pas dans DELETE_EMPLOYE) au nouvel employé qu'on met dans un input
                DataTasks: [action.payload, ...state.DataTasks]
            };
            default : 
                return state;
    }

}


export class Provider extends Component {

    state = {
        DataTasks : [
            {
            id : 1,
            item : 'Tâche 1',
            affiche : true
            },
            {
            id : 2,
            item : 'Tâche 2',
            affiche : true
            },
            {
            id : 3,
            item : 'Tâche 3',
            affiche : true
            }
        ],

        dispatch: 
            action => { 
                this.setState (
                    state => reducer(state, action)     
                )
            }
    }
    
    render() {

        return(
            <Context.Provider value={this.state}>
                
                {this.props.children} 
            </Context.Provider>
        )
    }
    
}

export const Consumer = Context.Consumer
