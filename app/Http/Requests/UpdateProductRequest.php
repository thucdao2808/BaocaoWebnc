<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id'   => 'required|unique:products,category_id',
            'name'          => 'required|unique:products,name',
            'quantity'      => 'required|numeric',
            'image_path'    => 'required|image',
            'price'         => 'required|numeric',
            'description'   => 'required',
            'tags'          => 'required|array',
            'tags.*'        => 'required|integer',
            'galleries'     => 'required|array',
            'galleries.*'   => 'nullable|image',
        ];
    }
}
