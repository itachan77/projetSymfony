import React, { Component } from 'react'
import './Compteur.css';
import Resultat from '../Resultat/Resultat.js';
import IncrBtn from '../IncrBtn/IncrBtn.js';
import {connect} from 'react-redux';

class Compteur extends Component {

    render() {
        return (
            <div className="cont">
            <div className="blocConmpt">
                <Resultat valeur={this.props.ctr} />
            </div>
            <div className="contBtn">
                <IncrBtn txt="Incremente" clicked={this.props.incremente} />
                <IncrBtn txt="Decremente" clicked={this.props.decremente} />
            </div>
        </div>
        )
    }
}

const mapStateToProps = state => {
    return {
        ctr : state.compteur
    }
}

const mapDispatchToProps = dispatch => {
    return {
        incremente: () => dispatch({type : 'INCREMENTE'}),
        decremente: () => dispatch({type : 'DECREMENTE'}),
    }
}

export default connect(mapStateToProps, mapDispatchToProps)(Compteur);
