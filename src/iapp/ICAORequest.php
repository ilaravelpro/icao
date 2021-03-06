<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 6:41 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\iApp;


use Illuminate\Database\Eloquent\Model;

class ICAORequest extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ICAO';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'icao_requests';
    protected $guarded = [];

    protected $casts = [
        'params' => 'array',
        'response' => 'array',
    ];

    public static function findByHash($hash)
    {
        return static::where('hash', $hash)->first();
    }

}
