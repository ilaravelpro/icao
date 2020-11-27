<?php

namespace iLaravel\ICAO\iApp\Http\Controllers\API\v1\ICAONotam;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case 'update':
                $rules = [
                    'key' => "required|string",
                    'location' => "required|string",
                    'subject' => "required|string",
                    'modifier' => "required|string",
                    'status' => "required|string",
                    'message' => "required",
                    'start_at' => "required",
                    'end_at' => "required",
                ];
                break;
        }
        $unique = $request->has('unique') ? $request->unique : $unique;
        if ($unique) return str_replace(['required'], ['nullable'], $rules[$unique]);
        return $rules;
    }
}
