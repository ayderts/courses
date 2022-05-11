<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowMaterialRequest;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Resources\MaterialResource;
use App\Models\Material;
use App\Services\MaterialService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class MaterialController extends Controller
{
    public MaterialService $materialService;

    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return MaterialResource::collection(Material::all());
    }

    public function show(Request $request, $id): MaterialResource
    {
        return MaterialResource::make($this->materialService->show($request, $id));
    }

    public function store(StoreMaterialRequest $request): MaterialResource
    {
        return MaterialResource::make($this->materialService->store($request));
    }
}
