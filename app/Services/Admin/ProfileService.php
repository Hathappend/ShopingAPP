<?php

namespace App\Services\Admin;

use App\Services\MasterServiceAbstract;

interface ProfileService
{
    public function update(array $data):bool;
}
