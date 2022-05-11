<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'mimes:docx,doc,pptx,ppt,xlsx,xls,txt,rar,zip,7z,png,img,jpg,jpeg|max:3096',
        ]);
        if ($request->file()) {
            $path = 'temp' . DIRECTORY_SEPARATOR . date('FY');
            $originalName = $request->file->getClientOriginalName();
            $path = Storage::put($path, $request->file);
            File::create(['name' => $originalName, 'file_path' => $path]);
            return response([
                    'message' => 'File upload successfully',
                    'file_path' => $path,
                ]
            );
        }
        return response([
            'error' => 'Invalid data',
        ], 422);

    }
}
