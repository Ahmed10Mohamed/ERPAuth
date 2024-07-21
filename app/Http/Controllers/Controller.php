<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
* @OA\Info(title="Fitshly Ecommerce Multi Vendor", version="0.1")

* @OA\SecurityScheme(
*     type="http",
*     securityScheme="bearerAuth",
*     scheme="bearer",
*     bearerFormat="JWT"
* )

*/
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
