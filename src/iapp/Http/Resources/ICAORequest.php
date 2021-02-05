<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 5:18 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

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
