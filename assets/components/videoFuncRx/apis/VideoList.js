import React, {Component} from 'react';
import VideoItem from './VideoItem';


const VideoList = ({videos, onVideoSelect}) => {

    const renderList = videos.map(video => {
        return (
            <VideoItem
            key={video.id.videoId} 
            onVideoSelect={onVideoSelect}
            video={video}/>
            )
    })

    return (
        <div className="list-group">
            {renderList}
        </div>
    )
};

export default VideoList;