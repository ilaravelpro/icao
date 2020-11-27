<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\ICAO\Vendor\ArcGis;

trait Store
{
    public function store(Request $request, $service = null, $server = null, $method = null) {
        if ($service && !$server && !$method) {
            $method = $service;
            $service = null;
        }
        elseif ($service && $server && !$method) {
            $method = $server;
            $server = $service;
            $service = null;
        }
        return ['data' => ArcGis::request($request->all(), $method, $service, $server)];
    }
}
