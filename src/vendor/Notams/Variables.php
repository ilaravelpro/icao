<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 8:30 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Vendor\Notams;

trait Variables
{
    private $url = "https://v4p4sz5ijk.execute-api.us-east-1.amazonaws.com/anbdata/states/notams/notams-realtime-list";

    public $model = 'ICAONotam';

    public $location = null;
}
