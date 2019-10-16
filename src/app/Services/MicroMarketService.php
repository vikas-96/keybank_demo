<?php

namespace App\Services;
use App\Models\MicroMarket;

class MicroMarketService
{
	public function __construct(MicroMarket $micromarket)
    {
        $this->micromarket = $micromarket ;
    }
    public function index($request)
    {
    	$data = $this->micromarket;
    	$data = $data->get();
    	return $data;
    }
}