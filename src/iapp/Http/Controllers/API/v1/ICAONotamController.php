<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class ICAONotamController extends Controller
{
    public $icao = null;

    use Index,
        Show,
        ICAONotam\Rules,
        ICAONotam\RequestData,
        ICAONotam\Filters,
        ICAONotam\SearchQ;
}
