<?php

namespace App\Services;

use App\Http\Resources\MaterialResource;
use App\Http\Resources\ProfileResource;
use App\Models\CompletedCourse;
use App\Models\Course;
use App\Models\File;
use App\Models\Lesson;
use App\Models\Material;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Collection\Collection;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class ProfileService
{
    function update($user_id,array $request){

        $profile = User::where('id',$user_id)->update($request);

        if(isset($profile)){
            return response()->json(
                [
                    'success' => true,
                    'message'=> 'Данные успешно сохранены'
                ]
            );
        }
        return  response()->json([
            'success' => false,
            'message' => 'ошибка при сохранении',
        ]);
    }

   public function updateAvatar($request): string // $file - передаем сам файл, $folder - желаемое название папки,куда нужно сохранить файл
    {
        if ($request->hasFile('avatar')) {
        $storePath = $request->file('avatar')
            ->store('users/' . date('F') . date('Y'));
        $user = auth()->user();

            $profile = User::where('id',$user['id'])->update(['avatar' => $storePath]);
            if(isset($profile)){
                return response()->json(
                    [
                        'success' => true,
                        'message'=> 'Данные успешно сохранены'
                    ]
                );
            }

        }
        return response(['error' => 'Загрузите файл',], 400);
    }



}
