<?php

namespace iLaravel\ICAO\iApp\Http\Resources;

use iLaravel\Core\iApp\Http\Resources\Resource;

class ICAORequest extends Resource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        return $data;
    }
}
