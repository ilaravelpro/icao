<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;


trait SearchQ
{
    public function searchQ($request, $model, $parent)
    {
        $q = $request->q;
        $model->where(function ($query) use ($q) {
            $query->where('icao_requests.server', 'LIKE', "%$q%")
                ->orWhere('icao_requests.service', 'LIKE', "%$q%")
                ->orWhere('icao_requests.method', 'LIKE', "%$q%")
                ->orWhere('icao_requests.params', 'LIKE', "%$q%")
                ->orWhere('icao_requests.response', 'LIKE', "%$q%");
        });
    }
}
