<?php

namespace App\View\Composers;

use Illuminate\View\View;

class NavbarComposer {
    public function __construct() {
    }

    public function compose(View $view): void {
        error_log("NavbarComposer");
        $view->with('data', "Esta es una prueba");
    }
}
