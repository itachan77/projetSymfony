import React from 'react';
import {Consumer} from './context';


class TodoList extends React.Component {
    state = {
        affiche: true,

    }
    

    deleteTask = (id, dispatch) => {
        dispatch({type: 'DELETE_TASK', payload: id})
    }

    render() {

        return(
            <Consumer>
                {value => {
                    return (
                        <table border="3" width="50%" align="center" cellPadding="0" cellspacing="0">
                                
                            <tr align="center">
                            <td>{this.props.item}{this.props.total}</td><td><i className="fas fa-times" onClick={()=>this.deleteTask(this.props.id, value.dispatch)}></i></td>
                            </tr>
                                
                        </table>
                    )
                }}

            </Consumer>
        )

    }
}

export default TodoList;