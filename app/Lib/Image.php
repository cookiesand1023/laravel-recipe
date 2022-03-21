<?php

namespace App\Lib;

use Illuminate\Http\Request;

class Image {

    public static function imageUpload($request) {

        $request->validate([
            'file' => 'mimes:jpg,jpeg,png|max:1024'
        ]);

        $extension = $request->file->getClientOriginalExtension();

        $storeName = 'upload_' . time() . '.' . $extension;

        $res = $request->file->storeAs("public/images", $storeName);

        if (strlen($res) !== 0) {
            return $storeName;
        }

    }
}