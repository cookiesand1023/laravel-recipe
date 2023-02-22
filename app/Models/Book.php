<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    protected $fillable = [
        'name', 'ctg_id', 'user_id', 'detail'
    ];


    // method

    // show user books
    public static function getMyBook($user_id) {
        $book = Book::where('user_id', $user_id)->get();

        return $book;
    }

    // get book data in 'book' page
    public static function getBookData($id) {
        $book = Book::where('id', $id)->get();

        return $book;
    }

    // get book data when user edit certain book (ajax)
    public static function getBookDataAjax($request) {
        $id = $request->id;

        $data = Book::where('id', $id)->get();

        if (isset($data[0]) === true) {

            $jsonData = json_encode($data[0], JSON_UNESCAPED_UNICODE);
    
            return $jsonData;

        } else {
            return false;
        }
    }

    // create new book (ajax)
    public static function insert($request) {

        $data = [
            'name' => $request->name,
            'ctg_id' => $request->ctg_id,
            'user_id' => $request->user_id,
            'detail' => nl2br($request->detail),
        ];

        $res = Book::create($data);

        return $res;
    }

    // edit existing book (ajax)
    public static function editBook($request) {
        $id = $request->id;
        $data = [
            'name' => $request->name,
            'ctg_id' => $request->ctg_id,
            'detail' => nl2br($request->detail),
        ];

        $res = Book::where('id', $id)->update($data);

        return $res;
    }
    
    // delete existing book (ajax)
    public static function deleteBook($request) {
        $id = $request->id;
        
        $res = Book::where('id', $id)->delete();

        return $res;
    }
}
