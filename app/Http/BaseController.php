<?php

namespace App\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as IlluminateBaseController;

class BaseController extends IlluminateBaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;
}
