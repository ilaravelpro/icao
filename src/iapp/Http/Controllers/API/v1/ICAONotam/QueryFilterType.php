<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 8:38 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;

use iLaravel\ICAO\Vendor\Notams;

trait QueryFilterType
{
    public function query_filter_type($model, $filter, $params, $current)
    {
        switch ($params->type) {
            case 'location':
                if ($filter->value){
                    Notams::request(strtoupper($filter->value));
                    $this->model::where('location', $filter->value)->where('end_at', '<',\Carbon\Carbon::now()->subHours(3)->format('Y-m-d H:i:s'))
                        ->each(function ($record) {
                            $record->delete();
                        });
                    $model->where('location', strtoupper($filter->value));
                }
                $current['location'] = $filter->value;
                break;
        }
        return $current;
    }
}
