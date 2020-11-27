<?php

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
        if ($unique) return str_replace(['required'], ['nullable'], $rules[$unique]);
        return $rules;
    }
}
