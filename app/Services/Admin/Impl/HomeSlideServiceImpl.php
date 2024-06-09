<?php

namespace App\Services\Admin\Impl;

use App\Models\HomeSlide;
use App\Services\Admin\HomeSlideService;
use Illuminate\Database\Eloquent\Builder;

class HomeSlideServiceImpl implements HomeSlideService
{
    public function update(HomeSlide $homeSlideFound, array $changes): bool
    {
        return $homeSlideFound->update($changes);
    }


}
