<?php


namespace iLaravel\ICAO\Vendor\Notams;


trait Construct
{
    public function __construct($location)
    {
        $this->location = $location;
        $this->model = imodal($this->model);
    }
}
