<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
        'trasactions_status' => 'required|string|in:IN_CART,PENDING,SUCCESS,CANCEL,FAILED',
        
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'travel_package_id.required' => 'Select a Paket Travel Required', 
    //         'image.required' => 'Image Required',
    //     ];
    // }
}
