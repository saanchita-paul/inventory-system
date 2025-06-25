<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'total',
        'discount',
        'vat',
        'paid_amount',
        'due_amount'
    ];
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

}
