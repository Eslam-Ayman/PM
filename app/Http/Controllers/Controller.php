<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUrl($path)
    {
        $arr =  explode('/' , $path);
        // the next check for storage/app/
        if ($arr[1] === 'storage') {
            $arr[1] = 'public';
        }
        // the next check for /storage/posts_images/
        elseif ($arr[0] == 'public') {
            $arr[0] = '/storage';
        }

        // $url = implode('/' , $arr);
        $url = join('/' , $arr);
        return $url;
    }
}
