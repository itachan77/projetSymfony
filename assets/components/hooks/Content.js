import React from 'react';
import useCatImage from './useCatImage';



    const Content = () => {
        
        //console.log(useState(1));
        //useState fonction native permet de modifier le nom de notre state (ex:myState) et le nom de sa modificcation (ex:setMyState)


        //la méthode native useEffect permet de s'exécuter une fois qu'il y a un changement de 
        //state (fait le update aussi)
        //[]signifie qu'on entre dans une boucle vide
        //[myState]fait le tour du tableau donc fait automatiquement dans le tableau 0,1,2,3,4...
        //fait un componentdidmount  une première fois et ensuite, fait un update1 ... update2

        const catUrl = useCatImage();

        return (
            <div>
                <img src={catUrl} alt="" width="25%"/>
            </div>
        )

    }

export default Content;