import Index from './components/coursReac/Index.js'

import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom';


//index.js
var elems = [
    'Element1',
    'Element2',
    'Element3',
    'Element4',
    'Element5',
    ]
    


ReactDOM.render(
<Index elems={elems} style={{color:"red"}}/>, document.getElementById('root')
);
