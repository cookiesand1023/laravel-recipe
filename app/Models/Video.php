<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Lib\Youtube;
use Illuminate\Pagination\LengthAwarePaginator;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'title',
        'thumbnail',
        'description',
    ];

    public static function pickupVideos() {
        $videos = Video::inRandomOrder()->take(6)->get();

        $videos = Video::getVideoValue($videos);
        
        return $videos;
    }

    public static function insert($request) {

        $video_id = Youtube::getVideoID($request->video_id);

        $description = ($request->description !== null) ? $request->description : "";

        $data = [
            'video_id' => $video_id,
            'title' => $request->video_title,
            'thumbnail' => $request->image,
            'description' => $description
        ];

        $video_exist = Video::where('video_id', $video_id)->first();

        if ($video_exist === null) {

            $res = Video::create($data);
            return $res;
        }

    }

    public static function getVideoData($videos) {
        
        foreach ($videos as $video) {
            
            $data = Video::where('video_id', $video->video_id)->get();
            
            
            $video->title = $data[0]->title;
            $video->thumbnail = $data[0]->thumbnail;
            $video->description = $data[0]->description;
            
        }

        return $videos;
    }

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
                $sub = Recipe::raw('(SELECT MAX(created_at) FROM recipes GROUP BY video_id)');
                $query->whereIn('created_at', [$sub]);
                $query->orderBy('created_at', 'desc');
                break;
            
            case 'latest':
                $sub = Recipe::raw('(SELECT MAX(updated_at) FROM recipes GROUP BY video_id)');
                $query->whereIn('updated_at', [$sub]);
                $query->orderBy('updated_at', 'desc');
                break;
            
            case 'value':
                $query->selectRaw('video_id, AVG(value)')->groupBy('video_id')->orderByRaw('AVG(value) DESC, updated_at DESC');
                break;
        }

        $videos = $query->paginate(12)->withQuerystring();

        $videos = Video::getVideoValue($videos);

        $videos = Video::getVideoData($videos);

        return $videos;

    }

    public static function showVideoDetail($request) {
        $id = $request->video_id;

        $videos = Video::where('video_id', $id)->get();

        $videos = Video::getVideoValue($videos);

        $videos = Video::getVideoData($videos);
        
        return $videos;
    }

    private static function getVideoValue($videos) {

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
        foreach ($videos as $video) {
            
            foreach ($valueArr as $value) {
                if ($video->video_id === $value['video_id']) {
                    $video->value_avg = $value['value_avg'];
                }
            }
        }
        
        return $videos;
    }

    private static function floorAvr($value) {
        $first = $value * 10;
        $second = floor($first);
        $third = $second / 10;
        $res = number_format($third, 1);

        return $res;
    }

}
