<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function uploads(string $url)
    {
        if (!Storage::exists("uploads/" . $url))
            return abort(404);
        return response(File::get(Storage::path("uploads/" . $url)))
            ->header("Content-Type", File::mimeType(Storage::path("uploads/" . $url)))
            ->header("Content-Length", File::size(Storage::path("uploads/" . $url)));
    }
}
