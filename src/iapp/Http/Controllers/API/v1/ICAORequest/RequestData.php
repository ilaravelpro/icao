<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;

use Carbon\Carbon;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\ICAO\Vendor\ICAORequest as Vendor;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['index']) && isset($request->lat)&& isset($request->lon)){
            $params = [];
        }
    }
}
