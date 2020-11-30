<?php

namespace iLaravel\ICAO\Vendor\ArcGis\Methods;

use GuzzleHttp\Client;
use Illuminate\Validation\ValidationException;

trait Request
{
    public static function request($params = [], $method = "find", $service = "WORLDROUTE", $server = "MapServer")
    {

        return (new self($service, $server, $method, $params))->_request();
    }

    public function _request($params = [])
    {
        $params = count($params) > 0 ? array_merge($this->params, $params) : $this->params;
        if (($country = array_search($params['searchText'],icao('countries'))) !== false)
            $params['searchText'] = $country;
        $params['f'] = "json";
        unset($params['page']);
        unset($params['per_page']);
        $paramsFilter = array_filter($params, function ($param) {return $param;});
        $icao_request = [
            'service' => $this->service,
            'server' => $this->server,
            'method' => $this->method,
        ];
        $icao_request['hash'] = md5(http_build_query(array_merge($paramsFilter, $icao_request)));
        if ($data = $this->model::findByHash($icao_request['hash'])) return $data->response;
        try {
            $client = new Client(['verify' => false]);
            $result = $client->get("{$this->url}{$this->service}/{$this->server}/{$this->method}", [
                'query' => $params
            ]);
            $content = $result->getBody()->getContents();
            $statuscode = $result->getStatusCode();
            if (200 !== $statuscode)
                throw new \Exception("Unable to retrieve weather data, http code " . $statuscode);
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
        $result = json_decode($content);
        if (isset($result->error))
            throw  ValidationException::withMessages(['icao' => $result->error->details]);
        $icao_request['params'] = $paramsFilter;
        $icao_request['response'] = array_column($result->results, 'attributes');
        if ($this->save)$this->model::create($icao_request);
        return $icao_request['response'];
    }
}
