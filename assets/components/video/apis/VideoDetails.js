import React from 'react';

const VideoDetail = ({video}) => {
    if(!video) {
        return (<div>Loading...</div>)
    }

    const videoSrc=`https://www.youtube.com/embed/${video.id.videoId}`

    return (
        <div>
            <div className="embed-responsive embed-responsive-4by3 mb-3">
                <iframe className="embed-responsive-item" title="video player" src={videoSrc}></iframe>
            
            </div>
            <div className="card mb-3">
                <div className="card body">
                    <h5 className="card-title">{video.snippet.title}</h5>
                    <p className="card-text">{video.snippet.description}</p>
                </div>
            </div>   
        </div>
    )


}

export default VideoDetail;