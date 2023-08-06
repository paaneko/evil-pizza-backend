<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'orderInfo.name' => 'required|string|max:128',
            'orderInfo.email' => 'email|max:128|nullable',
            'orderInfo.phoneNumber' => 'required|string|max:128',
            'orderInfo.street' => 'required|string|max:128',
            'orderInfo.houseNumber' => 'required|string|max:6',
            'orderInfo.entrance' => 'string|max:128|nullable',
            'orderInfo.apartment' => 'string|max:128|nullable',
            'orderInfo.floor' => 'string|max:6|nullable',
            'orderInfo.code' => 'string|max:6|nullable',
            'orderInfo.paymentMethod' => [
                'required',
                'string',
                Rule::in(['cash', 'google_pay', 'online_card'])
            ],
            'orderCartId' => 'exists:user_carts,id',
        ];
    }
}
