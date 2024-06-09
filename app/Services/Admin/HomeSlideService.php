<?php

namespace App\Services\Admin;

use App\Models\HomeSlide;
use Illuminate\Database\Eloquent\Builder;

interface HomeSlideService
{
    public function update(HomeSlide $homeSlideFound, array $changes): bool;
}
