<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSaleRequest;
use App\Models\Product;
use App\Services\SaleService;


class SaleController extends Controller
{
    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();

        $saleService = new SaleService();
        $saleService->processSale($data);

        return redirect()->route('reports.index');
    }

}
