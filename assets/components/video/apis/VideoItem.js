import React from 'react';
import myVideo from './VideoItem.css'


const VideoItem = ({video, onVideoSelect}) => {
    return(
        <div onClick={()=>onVideoSelect(video)}
        
        className="row list-group-item">
        <div className="myVideo"><img src={video.snippet.thumbnails.medium.url} alt=""/></div>
        <div className="myVideo">{video.snippet.title}</div>

        </div>
    )
}

export default VideoItem;