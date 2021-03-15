import React from 'react';



var elems = [
    'Element1',
    'Element2',
    'Element3',
    'Element4',
    'Element5',
    ]

var politesse = [
    'Salut',
    'Bonsoir',
    'Bonne journée',
    'Bonne nuit',
    'Au revoir',
    ]

class listeElements extends React.Component {
    constructor(props) {
        super(props)

    }

// listeElements = (elements) => {
//     return (
//         React.createElement("ul", null,
//         elements.map( 
//         (toto,index) => {return React.createElement("li", {key:index}, toto);}
//         ))
//     )
// }


liste=React.createElement(this.listeElements);

    render() {

        return(
            
            React.createElement("ul", null,
                this.props.elems.map( 
                (toto,index) => {return React.createElement("li", {key:index,style:this.props.style}, toto);}
                ))
        )

        
    }

}


export default listeElements

