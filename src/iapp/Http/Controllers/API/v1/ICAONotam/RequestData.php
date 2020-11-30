<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;
use iLaravel\ICAO\Vendor\Notams;

trait RequestData
{
    public function requestData(Request $request, $action, &$data)
    {
        if (in_array($action, ['index']) && isset($request->icao)){
            Notams::request(strtoupper($request->icao));
            $this->model::where('location', $request->icao)->where('end_at', '<',\Carbon\Carbon::now()->subHours(3)->format('Y-m-d H:i:s'))
                ->each(function ($record) {
                    $record->delete();
                });
        }
    }
}
