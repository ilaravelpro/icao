<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
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
        return [$filters, [], $operators];
    }
}
