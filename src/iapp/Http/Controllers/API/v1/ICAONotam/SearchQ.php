<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;


trait SearchQ
{
    public function searchQ($request, $model, $parent)
    {
        $q = $request->q;
        $model->where(function ($query) use ($q) {
            $query->where('icao_notams.location', 'LIKE', "%$q%")
                ->orWhere('icao_notams.key', 'LIKE', "%$q%")
                ->orWhere('icao_notams.subject', 'LIKE', "%$q%")
                ->orWhere('icao_notams.modifier', 'LIKE', "%$q%")
                ->orWhere('icao_notams.message', 'LIKE', "%$q%")
                ->orWhere('icao_notams.status', 'LIKE', "%$q%");
        });
    }
}
