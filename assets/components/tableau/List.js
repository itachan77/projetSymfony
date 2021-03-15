import React from 'react';
import {Consumer} from './context';
import TodoList from './TodoList';
import Header from './Header';


class List extends React.Component {

    render() {
        return(
            <Consumer>

                {value => {
                    return (
                        <div>
                            <Header total={value.DataTasks.length}/>
                            
                            {value.DataTasks.map(task => (
                                <TodoList
                                key={task.id} //important pour qu'il sache qu'il doit faire le tour
                                id={task.id}
                                item={task.item}
                                affiche={task.affiche}
                                //total={value.DataTasks.length}
                                />
                            ))}
                            
                            
                        </div>
                )}}

            </Consumer>
        )
    }
}


export default List;