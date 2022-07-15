<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MptService;
use App\Services\InternetServiceProvider\InternetServiceInterface;

class InternetServiceProviderController extends Controller
{
    protected $internetService;

    public function __construct(InternetServiceInterface $internetService)
    {
        $this->internetService = $internetService;    
    }

    public function getMptInvoiceAmount(Request $request)
    {
        $this->internetService->setMonth($request->get('month') ?: 1);

        $amount = $this->internetService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }

    public function getOoredooInvoiceAmount(Request $request)
    {
        $this->internetService->setMonth($request->get('month') ?: 1);

        $amount = $this->internetService->calculateTotalAmount();
        
        return response()->json([
            'data' => $amount
        ]);
    }
}
