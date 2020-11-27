<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $user = auth()->user();
        $filters = [];
        $current = [];
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'service',
                'title' => _t('service'),
                'type' => 'text'
            ],
            [
                'name' => 'server',
                'title' => _t('server'),
                'type' => 'text'
            ],
            [
                'name' => 'method',
                'title' => _t('method'),
                'type' => 'text'
            ],
        ];
        $this->requestFilter($request, $model, $parent, $filters, $operators);
        if ($request->q) {
            $this->searchQ($request, $model, $parent);
            $current['q'] = $request->q;
        }
        return [$filters, $current, $operators];
    }
}
