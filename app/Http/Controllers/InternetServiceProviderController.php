<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MptService;
use App\Http\Services\InternetServiceInterface;

class InternetServiceProviderController extends Controller
{
    protected $internetService;

    public function __construct(InternetServiceInterface $internetService)
    {
        $this->internetService = $internetService;    
    }

    public function getMptInvoiceAmount(Request $request)
    {
        $amount = $this->internetService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }

    public function getOoredooInvoiceAmount(Request $request)
    {
        $amount = $this->internetService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }
}
