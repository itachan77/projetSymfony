import Index from './components/reduxNextd/Index.js';
//import Header from './components/tableau/Header.js';
import './styles/app.scss';
import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom';
import {createStore} from 'redux';
import reducer from './components/reduxNextd/Store/reducer';
import {Provider} from 'react-redux';

//index.js

const store = createStore(reducer);

ReactDOM.render(
<Provider store={store}> <Index/> </Provider>
,document.getElementById('root')

);
