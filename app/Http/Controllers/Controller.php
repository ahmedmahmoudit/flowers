<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function updateSlug($model)
    {
        $slugEn = $model->name_en ?: $model->title_en;
        $slugAr = $model->name_ar ?: $model->title_ar;

        $model->slug_en = $slugEn ?: $slugAr;
        $model->slug_ar = $slugAr ?: $slugEn;

        $model->save();

    }

}
