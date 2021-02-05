<?php
/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:13 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\ICAO\Vendor\Notams\Methods;

use Carbon\Carbon;
use GuzzleHttp\Client;

trait Request
{
    public static function request($location)
    {

        return (new self($location))->_request();
    }

    private function _request()
    {
        $get = $this->model::where('location', $this->location)->where('created_at', '>', Carbon::now()->subMonth()->format('Y-m-d H:i:s'))->get();
        if ($get->count() >= 5)
            return $get;
        try {
            $client = new Client(['verify' => false]);
            $result = $client->get($this->url, [
                'query' => [
                    'format' => 'json',
                    'locations' => $this->location,
                    'api_key' => icao('api.key'),
                ]
            ]);
            $content = $result->getBody()->getContents();
            $statuscode = $result->getStatusCode();
            if (200 !== $statuscode)
                throw new \Exception("Unable to retrieve weather data, http code " . $statuscode);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        $result = json_decode($content);
        $records = [];
        foreach ($result as $index => $item) {
            $record = $this->model::where('location', $this->location)->where('key', $item->id)->first();
            if (!$record){
                $record['key'] = $item->id;
                $record['location'] = $item->location;
                $record['subject'] = $item->Subject;
                $record['modifier'] = $item->Modifier;
                $record['status'] = $item->status;
                $record['message'] = $item->message;
                $record['start_at'] = Carbon::parse($item->startdate)->format('Y-m-d H:i:s');
                $record['end_at'] = Carbon::parse($item->enddate)->format('Y-m-d H:i:s');
                $record = new $this->model($record);
                $record->save();
            }
            $records[] = $record;
            unset($record);
        }
        return $records;
    }
}
