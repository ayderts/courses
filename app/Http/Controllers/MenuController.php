<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Services\CoachHomeworkService;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private MenuService $menuService;
    public function __construct(MenuService $menuService) {
        $this->menuService = $menuService;
    }

    public function index() {
        return MenuResource::collection($this->menuService->allMenus());
    }

    public function show($menuId) {
        return new MenuResource($this->menuService->oneMenuById($menuId));
    }

    public function showBySlug($slug) {
        return new MenuResource($this->menuService->oneMenuBySlug($slug));
    }

    public function determine($identificator) {
        if (gettype(json_decode($identificator)) == 'integer') {
            $type = $this->show($identificator);
        } else {
            $type = $this->showBySlug($identificator);
        }
        return $type;
    }
}
