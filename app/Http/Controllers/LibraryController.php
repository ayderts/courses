<?php

namespace App\Http\Controllers;

use App\Http\Resources\LibraryResource;
use App\Services\LibraryService;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function __construct(LibraryService $libraryService)
    {
        $this->middleware('auth:api');
        $this->libraryService = $libraryService;
    }
    public function index(Request $request){

        return LibraryResource::collection($this->libraryService->index($request));
    }
    public function show(Request $request, $id){

        return LibraryResource::make($this->libraryService->show($id));
    }

}
