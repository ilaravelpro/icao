<?php


namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;


trait Filters
{
    public $statusFilter = false;

    public function filters($request, $model, $parent = null, $operators = [])
    {
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
        $this->filterWithSTED($request, $model, $parent, $filters, $operators);
        return [$filters, [], $operators];
    }
}
