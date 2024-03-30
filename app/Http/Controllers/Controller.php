<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $site;

    public function __construct()
    {
        $this->site = $site = Site::whereRaw('1')->firstOrFail();

        view()->share(compact('site'));
    }
}
