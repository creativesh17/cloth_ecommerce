<?php

namespace App\Http\View\Composers;

use App\User;
use App\Category;
use Illuminate\View\View;

class SettingsComposer {

    public function compose(View $view) {
        $user = User::first();
        $catgeories = Category::active()->get();
        $view->with(['user' => $user, 'categories' => $catgeories]);
    }
}