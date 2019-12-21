<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function show($filename)
    {
        $archive = 'files/' . $filename;
        if (!Storage::exists($archive)) {
            abort(404);
        }
        return Storage::get($archive);
    }
}
