<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use App\Models\JournalEntry;

class SaleService
{
    public function processSale(array $data): Sale
    {
        $discount = $data['discount'] ?? 0;
        $subtotal = 0;

        foreach ($data['products'] as $item) {
            $product = Product::find($item['id']);
            $subtotal += $product->sell_price * $item['quantity'];
        }

        $afterDiscount = $subtotal - $discount;
        $vat = $afterDiscount * 0.05;
        $total = $afterDiscount + $vat;
        $due = $total - $data['paid_amount'];


        $sale = Sale::create([
            'total' => $total,
            'discount' => $discount,
            'vat' => $vat,
            'paid_amount' => $data['paid_amount'],
            'due_amount' => $due,
        ]);

        foreach ($data['products'] as $item) {
            $product = Product::find($item['id']);

            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->sell_price
            ]);

            $product->decrement('stock', $item['quantity']);
        }

        JournalEntry::insert([
            ['sale_id' => $sale->id, 'type' => 'sales', 'amount' => $subtotal],
            ['sale_id' => $sale->id, 'type' => 'discount', 'amount' => $discount],
            ['sale_id' => $sale->id, 'type' => 'vat', 'amount' => $vat],
            ['sale_id' => $sale->id, 'type' => 'payment', 'amount' => $data['paid_amount']],
        ]);

        return $sale;
    }
}
