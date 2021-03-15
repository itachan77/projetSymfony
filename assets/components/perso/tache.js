import React from 'react';
import Croix from './croix.js'
import Check from './check.js'



let bool;

const Tache = ({toto, maSupp,changeBool, ide}) => {

    const monCheck = () => {
        console.log("cliqué");
        console.log(toto.id);
    }


    /*
    const monStyle = () => {
        if (toto.coche) {
            return {borderLeft:"3px solid red"};
        }
    }
    */




    return (
        <div>
            <table border="1" width="50%">
                
                <tbody>
                    <tr>
                        <>
                            <td width="250px">{toto.nom} {toto.prenom} {toto.email} {ide}</td><td><Check toto={toto} monCheck={monCheck} changeBool={changeBool} /></td><td><Croix toto={toto} monClick={()=>maSupp(toto.id)} /></td>

                        </>
                    </tr>
                </tbody>

            </table>

            
            
        </div>
    )

}

export default Tache