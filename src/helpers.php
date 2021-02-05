<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 8:26 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

function icao_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function icao($key = null, $default = null)
{
    return iconfig('icao' . ($key ? ".$key" : ''), $default);
}
