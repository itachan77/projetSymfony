import axios from 'axios';

//j'implémente la clef d'api youtube que j'ai récupéré

const KEY = 'AIzaSyBc7_0nAdIFFJylxZ_FvY-0w7lrc7dZ3j4';

export default axios.create({
    baseURL: 'https://www.googleapis.com/youtube/v3',
    params: {
        //part veut dire qu'on récupère une partie de l'information. Ces propriétés sont indiquées dans la doc de l'api en question. Ici,
        //on peut savoir quel info mettre grace à la doc en question qui se trouve à cette adresse : 
        //developers.google.com/youtube/v3/docs/search/list
        
        part: 'snippet',
        maxResults: 5,
        key: KEY
    }
})