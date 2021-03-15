import React, {useState, useEffect} from 'react';
//import ReactDOM from 'react-dom';
//import Content from './Components/Content';

//app.js

const Index = () => {
    const [pos,setPos] = useState([0,0]);
        
const logMousePosition = (e) => {
    console.log(e.clientX, e.clientY);
    let arrPos = [];
    arrPos[0] = e.clientX;
    arrPos[1] = e.clientY;
    setPos(arrPos[0],arrPos[1])
}

useEffect(() => {
    console.log('Action lancée');
    window.addEventListener('mousemove', logMousePosition)

    //sans faire le return, le programme se lance sans arret
    return () => {
        console.log('cleaner')
        window.addEventListener('mousemove', logMousePosition)
    }
},[])

    return(
        <div className="App">
            Bonjour je suis nettoyé
        </div>
    )

}

export default Index;