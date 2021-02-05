<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 8:16 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Vendor\Notams;


trait Construct
{
    public function __construct($location)
    {
        $this->location = $location;
        $this->model = imodal($this->model);
    }
}
