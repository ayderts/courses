<?php

namespace App\Services;
use App\Models\Menu;

class MenuService {

    public function oneMenuById(int $menuId) {
        return Menu::find($menuId);
    }

    public function oneMenuBySlug(string $slug) {
        return Menu::where('slug', $slug)->firstOrFail();
    }

    public function allMenus() {
        return Menu::all();
    }
}



