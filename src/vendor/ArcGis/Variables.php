<?php

namespace iLaravel\ICAO\Vendor\ArcGis;

trait Variables
{
    private $url = "https://gis.icao.int/ArcGIS/rest/services/";
    public $service = "WORLDROUTE";
    public $server = "MapServer";
    public $method = "find";

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