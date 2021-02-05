<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/30/20, 8:55 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Vendor\ArcGis;


trait Construct
{
    public function __construct($service = "WORLDROUTE", $server = "MapServer", $method = "find", $params = [], $save = true)
    {
        if ($service) $this->service = $service;
        if ($server) $this->server = $server;
        if ($method) $this->method = $method;
        $this->save = $save;
        $this->model = imodal($this->model);
        $this->params = array_merge($this->params, $params);
    }
}
