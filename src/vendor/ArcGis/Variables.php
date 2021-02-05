<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/30/20, 8:45 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Vendor\ArcGis;

trait Variables
{
    private $url = "https://gis.icao.int/ArcGIS/rest/services/";
    public $service = "WORLDROUTE";
    public $server = "MapServer";
    public $method = "find";
    public $save = true;

    public $model = "ICAORequest";

    public $params = [
        "page" => 1,
        "per_page" => 20,
        "f" => "json",
        "tolerance" => 10,
        "returnGeometry" => 'true',
        //"imageDisplay" => '1023,264,96',
        "geometryType" => 'esriGeometryPoint',
        //"sr" => 102100,
        "layers" => 'visible:0,3,7',
    ];
}
