<?php

namespace App\Services;

use App\Http\Requests\ShowMaterialRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Models\Course;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialService
{
    const MATERIALS_RELATIVE_PATH = 'materials';
    const FILE_TYPE_REQUIRED = 'required';
    const FILE_TYPE_OPTIONAL = 'optional';

    function show(Request $request, $id)
    {
        return Material::findOrFail($id);
    }

    function store(StoreMaterialRequest $request)
    {
        $material = null;
        if ($request->has('files')) {
            $filePaths = explode(',', $request->input('files'));
            $data = array_merge($request->except('files'), [
                'file_type' => $request->boolean('file_type') ? self::FILE_TYPE_REQUIRED : self::FILE_TYPE_OPTIONAL,
            ]);
            foreach ($filePaths as $filePath) {
                $file = File::query()->where('file_path', $filePath)->firstOrFail();
                $newPath = self::MATERIALS_RELATIVE_PATH . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR . $file->generated_name;
                if (Storage::move($file->file_path, $newPath)) {
                    $file->update(['file_path' => $newPath]);
                    $materialFileUrl = [
                        'file_url' => json_encode([(object)[
                            'download_link' => $file->file_path,
                            'original_name' => $file->name,
                        ]])
                    ];
                    $material = Material::query()->create($data + $materialFileUrl);
                }
            }
        }
        return $material;
    }
}
