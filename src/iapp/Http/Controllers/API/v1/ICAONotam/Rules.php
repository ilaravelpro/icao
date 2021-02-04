<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case "data":
            case "index":
                $rules = ['icao' => "nullable|string"];
                break;
            case 'update':
                $rules = [
                    'key' => "required|string",
                    'location' => "required|string",
                    'subject' => "required|string",
                    'modifier' => "required|string",
                    'status' => "required|string",
                    'message' => "required|string",
                    'start_at' => "required|string",
                    'end_at' => "required|string",
                ];
                break;
        }
        $unique = $request->has('unique') ? $request->unique : $unique;
        if ($unique) return str_replace(['required'], ['nullable'], _get_value($rules, $unique, 'nullable|string'));
        return $rules;
    }
}
