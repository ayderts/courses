<?php

namespace App\Http\Controllers;

use App\Http\Requests\DownloadRequest;
use App\Models\File;
use App\Models\Homework;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function download(DownloadRequest $request): StreamedResponse
    {
        $filePath = null;
        $file = null;
        switch ($request->input('namespace')) {
            case 'materials':
                $model = Material::query()->findOrFail($request->input('id'));
                $modelFiles = json_decode($model->file_url);
                $file = $modelFiles[$request->input('index')];
                $filePath = str_replace('\\', '', $file->download_link);
                break;
            case 'homeworks':
                $model = Homework::query()->findOrFail($request->input('id'));
                $modelFiles = json_decode($model->file_url);
                $file = $modelFiles[$request->input('index')];
                $filePath = str_replace('\\', '', $file->download_link);
                break;
            case 'files':
                $file = File::query()->findOrFail($request->input('id'));
                $filePath = $file->file_path;
                break;
            default:
                return abort(404);
        }
        if (!empty($filePath) and !empty($file)) {
            return Storage::download($filePath, $file->original_name);
        }
        return abort(404);
    }
}
