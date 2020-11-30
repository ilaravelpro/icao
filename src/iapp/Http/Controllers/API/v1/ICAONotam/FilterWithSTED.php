<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait FilterWithSTED
{
    public function filterWithSTED(Request $request, $model, $parent = null, $filters = [], $operators = [])
    {
        $start_time = $request->has('st') ? str_replace('/', '-', $request->st) : null;
        $end_time = $request->has('et') ? str_replace('/', '-', $request->et) : null;
        $request->validate([
            'st' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'et' => ['nullable', 'date_format:Y-m-d H:i:s'],
        ]);
        $model->where(function ($query) use ($start_time, $end_time) {
            if ($start_time) $query->where('start_at', '>', $start_time);
            if ($end_time) $query->where('end_at', '<', $end_time);
            return $query;
        });
    }
}
