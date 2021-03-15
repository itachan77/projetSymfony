import React from 'react';
import {Consumer} from './context';
import {v1 as uuid} from 'uuid';




class AddTask extends React.Component {

    //STATE
    state = {
        nom:'',
        item:'',
        affiche:true
    }

    //FONCTIONS



    onChange = e => this.setState({
        [e.target.name] : e.target.value 
    })


    onSubmit = (dispatch, e) => {
        e.preventDefault();
        const newTask = {
            id: uuid(),
            item: this.state.item,
            affiche: this.state.affiche,
        }

        dispatch({type: 'ADD_TASK', payload: newTask})
    }

    //RENDU
    render() {

        return(
            <Consumer>
                {value => {
                    return (

                        <div>
                            <form onSubmit={this.onSubmit.bind(this, value.dispatch)}>
                            <table border="3" width="50%" align="center" cellPadding="0" cellspacing="0">
                                <tr align="center">

                                            <div><input type="text" name="item" placeholder="Entrez une tâche" onChange={this.onChange} value={this.state.item}/></div>
                                            <input type="submit" value="Ajouter une Tâche" className="btn btn-primary mt-3"/>
                                        
                                    
                                </tr>
                            </table>
                            </form>
                        </div>

                    )
                }}
            </Consumer>
        )

    }



}


export default AddTask;