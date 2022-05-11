<?php

namespace App\Services;

use App\Models\Library;
use Illuminate\Support\Facades\Storage;

class LibraryService
{
    function index($request){
        $books = Library::query();
        if (isset($request->category_id)){
               $books->whereIn('handbook_library_category_id', $request->category_id);
        }
        if (isset($request->author_id)){
            $books->whereIn('handbook_library_author_id',$request->author_id);
        }
        if (isset($request->publisher_id)){
            $books->whereIn('handbook_library_publisher_id',$request->publisher_id);
        }
        $books_file = $books->get();
        foreach ($books_file as $key => $book) {
           $book->files_url = json_decode($book->files_url);
            $book->image_url = Storage::disk(config('voyager.storage.disk'))->url($book->image_url);
           foreach ($book->files_url as $key =>$files){
               $files->download_link = Storage::disk(config('voyager.storage.disk'))->url($files->download_link);
           }
        }
        return $books_file;
    }
    function show($id){
        $books = Library::find($id);
            $books['files_url'] = json_decode($books['files_url']);
            $books['image_url'] = Storage::disk(config('voyager.storage.disk'))->url($books['image_url']);
            foreach ($books['files_url'] as $keys =>$files){
                $files->download_link = Storage::disk(config('voyager.storage.disk'))->url($files->download_link);
            }
        return $books;
    }

}
