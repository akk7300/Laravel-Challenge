<?php 

namespace App\Http\Services;
use App\Http\Services\InternetServiceInterface;

class OoredooService implements InternetServiceInterface{

    public function calculateTotalAmount()
    {
        return '1800';
    }
}   