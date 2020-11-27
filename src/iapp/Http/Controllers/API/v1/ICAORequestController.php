<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1;

use iLaravel\Core\iApp\Http\Controllers\API\Controller;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Index;
use iLaravel\Core\iApp\Http\Controllers\API\Methods\Controller\Show;


class ICAORequestController extends Controller
{
    use Index,
        Show,
        ICAORequest\Store,
        ICAORequest\Rules,
        ICAORequest\RequestData,
        ICAORequest\Filters,
        ICAORequest\SearchQ;
}
