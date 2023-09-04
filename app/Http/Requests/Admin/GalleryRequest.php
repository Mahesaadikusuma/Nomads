<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
        'travel_package_id' => 'required|integer|exists:travel_packages,id',
        'image' => 'required|image|max:5048|mimes:jpeg,png,jpg,svg', 
        ];
    }

    public function messages(): array
    {
        return [
            'travel_package_id.required' => 'Select a Paket Travel Required', 
            'image.required' => 'Image Required',
        ];
    }
}
