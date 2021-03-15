import {useState, useEffect} from 'react';
import youtube from '../apis/youtube.js';


//on transfère dans ce fichier useVideos ce qui nous était utile dans Index.js
const useVideos = (defaultSearchTerm) => {

    const [videos, setVideos] = useState([]);

    //fonction native useEffect
    useEffect ( (defaultSearchTerm) => {
        search(defaultSearchTerm)
    },[defaultSearchTerm]);

    //fonction onTermSubmit (renommée search) pour que les fonctions soient réutilisables
    //term est un paramètre (ce qu'on écrit dans la barre de recherche) qu'on aurait pu mettre entre parenthèse
    const search = async term => {
        const reponse = await youtube.get('/search', {
            params: {
                q : term
            }
        })
        setVideos(reponse.data.items);
        setSelectedVideo(reponse.data.items[0]);
    }

    //return [videos, search] : on retourne un tableau
    //return {videos, search} : on retourne un objet
    //videos est le state et search est la méthode qui permet de modifier ce state
    return [videos, search]

}

export default useVideos;