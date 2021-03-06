<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 11/27/20, 8:48 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\iApp;


use Illuminate\Database\Eloquent\Model;

class ICAONotam extends Model
{
    use \iLaravel\Core\iApp\Modals\Modal;

    public static $s_prefix = 'ICAON';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;
    protected $table = 'icao_notams';
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public $datetime = [
        'start_at' => 'Y-m-d H:i',
        'end_at' => 'Y-m-d H:i',
    ];

    public function getStartAtAttribute($value)
    {
        return format_datetime($value, $this->datetime, 'start_at');
    }

    public function getEndAtAttribute($value)
    {
        return format_datetime($value, $this->datetime, 'end_at');
    }

    public static function getByICAO($icao)
    {
        return static::where('location', $icao)->get();
    }

}
