<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/30/20, 8:13 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\iApp;


use Illuminate\Database\Eloquent\Model;

class ICAOImport extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ICAOI';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'icao_imports';
    protected $guarded = [];

    protected $casts = [
        'data' => 'array',
        'params' => 'array',
        'ended' => 'array',
    ];

    public static function findByKey($key)
    {
        return static::where('key', $key)->first();
    }

}
