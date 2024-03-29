<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'slug' => 'required|unique:products',
            'description'   => 'required',
            'tendor_id'     => 'required',
            'category_id'   => 'required',
            'image_id'      => 'required|image|max:1000',
            'init_price'    => 'required|numeric',
            'discount_rate' => 'required|numeric|max:100',
            'quantity'      => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'tendor_id.required'    => 'tendor field required',
            'category_id.required'  => 'Category field required',
            'image_id.required'     => 'Image field required'
        ];
    }
}
