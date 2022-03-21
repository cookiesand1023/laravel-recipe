<?php

namespace App\Lib;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;
use App\Models\Recipe;
use App\Models\Category;
use App\Lib\Youtube;
use App\Lib\Video;
use Illuminate\Support\Facades\Auth;

class Video {

    // 
    public static function sortAndSearchAllVideos($request) {

        $sort = (isset($request->sort) === true) ? $request->sort : 'all';
        $searchKey = (isset($request->search) === true) ? $request->search : '';

        $query = Recipe::query();

        if ($searchKey !== '') {
            $pat = '%' . addcslashes($searchKey, '%_\\') . '%';
            $query->where('name', 'LIKE', $pat);
        }
        
        switch ($sort) {
            case 'all':
                $query->orderBy('created_at', 'desc');
                break;
            
            case 'latest':
                $query->orderBy('updated_at', 'desc');
                break;
            
            case 'value':
                $query->selectRaw('video_id, AVG(value)')->groupBy('video_id')->orderByRaw('AVG(value) DESC, updated_at DESC');
                break;
        }

        $videos = $query->get()->unique('video_id');

        $videoArr = [];
        foreach ($videos as $video) {
            $videoArr[] = ['video_id' => $video->video_id];
        }

        $videoArr = Video::getVideoValue($videoArr);

        $videoArr = Youtube::getVideoData($videoArr);

        return $videoArr;

    }

    public static function showVideoDetail($request) {
        $id = $request->video_id;

        $videoArr[] = ['video_id' => $id];

        $videoArr = Video::getVideoValue($videoArr);

        $videoArr = Youtube::getVideoData($videoArr);

        return $videoArr;
    }

    private static function getVideoValue($videoArr) {

        $values = Recipe::selectRaw('video_id, AVG(value) AS value_avg')->groupBy('video_id')->orderByRaw('AVG(value) DESC')->get();
        
        $valueArr = [];
        foreach ($values as $value) {
            $valueArr[] = [
                'video_id' => $value->video_id,
                'value_avg' => $value->value_avg
            ];
        }
        
        // 平均を小数点第一位までの値に変換
        foreach ($valueArr as &$value) {
            $floorVal = Video::floorAvr($value['value_avg']);
            $value['value_avg'] = $floorVal;
            unset($value);
        }
        
        // 平均をvideoArrに追加する
        foreach ($videoArr as &$video) {
            
            foreach ($valueArr as $value) {
                if ($video['video_id'] === $value['video_id']) {
                    $video['value_avg'] = $value['value_avg'];
                }
            }
            unset($video);
        }
        
        return $videoArr;
    }

    private static function floorAvr($value) {
        $first = $value * 10;
        $second = floor($first);
        $third = $second / 10;
        $res = number_format($third, 1);

        return $res;
    }

}
