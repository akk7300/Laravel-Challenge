<?php 

namespace App\Http\Services;
use App\Http\Services\InternetServiceInterface;

class MptService implements InternetServiceInterface{
    
    public function calculateTotalAmount()
    {
        return '2500';
    }
}   