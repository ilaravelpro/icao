<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class ICAONotamController extends Controller
{
    use Index,
        Show,
        ICAONotam\Rules,
        ICAONotam\RequestData,
        ICAONotam\FilterWithSTED,
        ICAONotam\Filters,
        ICAONotam\SearchQ;
}
