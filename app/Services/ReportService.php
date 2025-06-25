<?php

namespace App\Services;

use App\Models\Sale;

class ReportService
{
    public function generate($from, $to)
    {
        $sales = Sale::whereBetween('created_at', [$from, $to])
            ->with('items.product')
            ->get();

        $totalSales = $sales->sum('total');
        $totalDiscount = $sales->sum('discount');
        $totalVat = $sales->sum('vat');
        $totalPaid = $sales->sum('paid_amount');
        $totalDue = $sales->sum('due_amount');

        $totalExpense = 0;
        foreach ($sales as $sale) {
            foreach ($sale->items as $item) {
                $totalExpense += $item->quantity * $item->product->purchase_price;
            }
        }

        $profit = $totalSales - $totalDiscount - $totalExpense;

        return [
            'sales' => $sales,
            'totalSales' => $totalSales,
            'totalDiscount' => $totalDiscount,
            'totalVat' => $totalVat,
            'totalPaid' => $totalPaid,
            'totalDue' => $totalDue,
            'totalExpense' => $totalExpense,
            'profit' => $profit,
        ];
    }
}
