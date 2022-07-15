<?php

namespace App\Services\InternetServiceProvider;
use App\Services\InternetServiceProvider\InternetServiceInterface;

class Ooredoo implements InternetServiceInterface
{
    protected $operator = 'ooredoo';
    
    protected $month = 0;
    
    protected $monthlyFees = 150;
    
    public function setMonth(int $month)
    {
        $this->month = $month;
    }
    
    public function calculateTotalAmount()
    {
        return $this->month * $this->monthlyFees;
    }
}