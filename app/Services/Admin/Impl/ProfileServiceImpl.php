<?php

namespace App\Services\Admin\Impl;

use App\Models\User;
use App\Services\Admin\ProfileService;
use App\Services\MasterServiceAbstract;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileServiceImpl extends MasterServiceAbstract implements ProfileService
{
    public function update(array $data): bool
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $findUser = User::find($userId);

            if ($findUser) {
                $findUser->fill($data);
                return $findUser->update();
            }
        }

        return false;
    }

}
