<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/29/21, 6:14 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAORequest;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case 'update':
                $rules = [
                    'server' => "required|string",
                    'service' => "required|string",
                    'method' => "required|string",
                    'hash' => "required|string",
                    'params' => "required",
                    'response' => "required",
                ];
                break;
        }
        $unique = $request->has('unique') ? $request->unique : $unique;
        if ($unique) return str_replace(['required'], ['nullable'], _get_value($rules, $unique, 'nullable|string'));
        return $rules;
    }
}
