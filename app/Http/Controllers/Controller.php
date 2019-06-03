<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $topAuthor = (new User)->getTopAuthor();
        $definition_enabled = config('definition.enabled');

        view()->share('topAuthor',$topAuthor);
        view()->share('definition_enabled',$definition_enabled);
    }
}
