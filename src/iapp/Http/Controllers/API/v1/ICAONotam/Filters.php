<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $current = [];
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'key',
                'title' => _t('key'),
                'type' => 'text'
            ],
            [
                'name' => 'location',
                'title' => _t('location'),
                'type' => 'text'
            ],
            [
                'name' => 'subject',
                'title' => _t('subject'),
                'type' => 'text'
            ],
            [
                'name' => 'modifier',
                'title' => _t('modifier'),
                'type' => 'text'
            ],
            [
                'name' => 'status',
                'title' => _t('status'),
                'type' => 'text'
            ],
        ];
        $this->requestFilter($request, $model, $parent, $filters, $operators);
        if ($request->q) {
            $this->searchQ($request, $model, $parent);
            $current['q'] = $request->q;
        }
        if ($request->icao) {
            $model->where('location', strtoupper($request->icao));
            $current['icao'] = strtoupper($request->icao);
        }
        return [$filters, $current, $operators];
    }
}
