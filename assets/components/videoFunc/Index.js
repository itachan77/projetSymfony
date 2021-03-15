//app.js
import React, {useState, useEffect} from 'react';
import SearchBar from './SearchBar';
import youtube from './apis/youtube';
import VideoList from './apis/VideoList';
import VideoDetails from './apis/VideoDetails';
import myScroll from './apis/VideoItem.css';


const IndexTube = () => {

    const [videos, setVideos] = useState([]);
    const [selectedVideo, setSelectedVideo] = useState(null);

    //api : c'est une clef qui nous permet de récupérer les données déjà disponibles ailleurs et les exploiter 
    //le get a déjà toute l'adresse. Il suffit de rajouter search https://www.googleapis.com/youtube/v3/search
    //ce lien remplace une requete SQL c'est à dire qu'il fait recherche ce qu'on veut
    // q veut dire query. q permet donc de rechercher ce equi a été saisi dans l'input
    //context.js = redux (sauf que redux est utilisé pour les très gros projets)
    //q est un paramètre de youtube qui pourrait se mettre dans le module youtube.js mais qui est ici
    //car on ne connait pas déjà la valeur de q puisque (sa valeur est ce que nous tapons dnas la barre de recherche)
//https://www.youtube.com/embed/

    const onTermSubmit = async term => {
        const reponse = await youtube.get('/search', {
            params: {
                q : term
            }
        })

        //console.log(reponse); pour voir les infos récupérées par l'api youtube
        //: on voit que reponse est un tableau

        setVideos(reponse.data.items);
        setSelectedVideo(reponse.data.items[0]);
    }


    //cette fonction propre à react affiche ce qui est demandé uen fois que la page est chargée
    
    useEffect ( () => {
        onTermSubmit('dessins')
    },[]);
    

    const onVideoSelect = (video) => {
        // this.state.selectedVideo
        console.log('depuis notre app', video);
        setSelectedVideo(video)
    }

        return (
            <div className="container mt-5">
                <SearchBar onFormSubmit={onTermSubmit}/>
                J'ai {videos.length} vidéos.
                
                <div className="row">
                    <div className="col-12 col-lg-8">
                        <VideoDetails video={selectedVideo}/>
                    </div>
                    <div className="col-lg-4 col-12 myScroll">
                        <VideoList onVideoSelect={onVideoSelect} videos={videos}/>
                    </div>
                    
                </div>
            </div>
        );
    
}

export default IndexTube;