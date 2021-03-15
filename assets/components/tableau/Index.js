import React from 'react';
//import Header from './Header.js';
import List from './List.js';
import AddTask from './AddTask.js';
import { Provider } from './context';
import {Consumer} from './context';

class Index extends React.Component {


    render() {
        return (
            <Consumer>
                {value => {
                    return (
                        <div>
                            <Provider>
                                
                                <List/>
                                <AddTask/>
                            </Provider>
                        </div>
                    )}
                    }
            </Consumer>
            
        );
    }
}


export default Index;

