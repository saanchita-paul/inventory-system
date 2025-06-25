<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $filtered = collect($this->input('products'))
            ->filter(fn ($item) => isset($item['quantity']) && $item['quantity'] > 0)
            ->values()
            ->toArray();

        $this->merge([
            'products' => $filtered
        ]);
    }

    public function rules(): array
    {
        return [
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|integer|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
        ];
    }
}
