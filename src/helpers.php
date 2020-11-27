<?php

function icao_path($path = null)
{
    $path = trim($path, '/');
    return __DIR__ . ($path ? "/$path" : '');
}

function icao($key = null, $default = null)
{
    return iconfig('icao' . ($key ? ".$key" : ''), $default);
}
