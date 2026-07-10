<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodBagRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bag_number' => [
                'sometimes',
                'string',
                'max:50',
                'unique:blood_bags,bag_number',
            ],

            'blood_group' => [
                'sometimes',
                'in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            ],

            'donor_name' => [
                'sometimes',
                'string',
                'max:100',
            ],

            'collection_date' => [
                'sometimes',
                'date',
                'before_or_equal:today',
            ],

            'expiry_date' => [
                'sometimes',
                'date',
                'after:collection_date',
            ],

            'quantity_ml' => [
                'sometimes',
                'integer',
                'min:100',
                'max:500',
            ],

            'status' => [
                'sometimes',
                'in:available,reserved,
                 dispatched,
                 expired',
            ],
        ];
    }
}
