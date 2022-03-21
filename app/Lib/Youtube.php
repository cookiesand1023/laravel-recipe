<?php

namespace App\Lib;

class Youtube {

    public static function getVideoID($url) {

        preg_match('/\?v=([^&]+)/', $url , $match);
        $id = $match[1];

        return $id;
    }

    public static function getYoutubeData($url) {
        
        $API_KEY = 'AIzaSyDbpwgc_p0G2Gh3PgsZglCyv4V1ZuiViXQ';

        $id = Youtube::getVideoID($url);
        $base_url = "https://www.googleapis.com/youtube/v3/";

        $API_URL = $base_url . "videos?id=" . $id . "&part=snippet&key=" . $API_KEY;

        $video = json_decode(file_get_contents($API_URL));

        $title = $video->items[0]->snippet->title;
        $thumbnail = $video->items[0]->snippet->thumbnails->medium->url;
        $detail = $video->items[0]->snippet->description;

        $dataArr = [
            'title' => $title,
            'thumbnail' => $thumbnail,
            'detail' => nl2br($detail)
        ];
    
        $jsonData = json_encode($dataArr, JSON_UNESCAPED_UNICODE);
        
        return $jsonData;
    }

    // public static function getVideoData($videoArr) {

    //     $API_KEY = 'AIzaSyDbpwgc_p0G2Gh3PgsZglCyv4V1ZuiViXQ';
    //     $base_url = "https://www.googleapis.com/youtube/v3/";

    //     foreach ($videoArr as &$video) {

    //         $id = $video['video_id'];
    
    //         $API_URL = $base_url . "videos?id=" . $id . "&part=snippet&key=" . $API_KEY;
    
    //         $videos = json_decode(file_get_contents($API_URL));
    
    //         $title = $videos->items[0]->snippet->title;
    //         $thumbnail = $videos->items[0]->snippet->thumbnails->medium->url;
    //         $detail = $videos->items[0]->snippet->description;
            
    //         $video['title'] = $title;
    //         $video['thumbnail'] = $thumbnail;
    //         $video['detail'] = nl2br($detail);
            
    //         unset($video);
    //     }

    //     return $videoArr;
    // }
}