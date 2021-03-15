import React from 'react'
import PropTypes from 'prop-types'

const Button = ({color, text, monClick}) => {
    

    return (
        <button className="btn" style={{backgroundColor:color}} onClick={monClick}>{text}</button>
    )

}

//propTypes est une fonction native tandis que PropTypes est le nom de l'import
Button.propTypes = {
    color:PropTypes.string,
    text:PropTypes.string,
    addOnClick:PropTypes.func,
}

export default Button;