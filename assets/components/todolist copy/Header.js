//rafce
import React from 'react'
import PropTypes from 'prop-types'
import Button from './Button'
import Tasks from './Tasks'





//un accolade pour faire appel à un objet existant ailleurs
//double accollade pour afficher du brut
const Header = ({title, onAddTask, showAddForm}) => {

    const onClickHandler = () => {
        console.log("click");
    }

    return (
        
        <header className="header">
            {/* <h1 style={{color:"red",backgroundColor:"black"}}> {title}</h1> */}
            {/* <h1 style={{color:"red",backgroundColor:"black"}}> {title}</h1> */}
            <h1 style={headingStyle}>{title}</h1>
            <Button color={showAddForm ? "red" : "green"} text={showAddForm ? "Close" : "Add"} monClick={onAddTask}/>
        </header>
        
        
        
    )
}

//avoir des valeurs de propriété par défaut
Header.defaultProps = {
    title: "Todo List"
}

//Typer la valeur des propriétés
//(si on attend un string, ne pourra prendre q'un string et pas un nombre)

Header.propTypes = {
    title:PropTypes.string.isRequired
}



//autre facon d'envoyer du style css : créer une constante
const headingStyle = {
    color:"white",
    backgroundColor:"black"
}

export default Header
