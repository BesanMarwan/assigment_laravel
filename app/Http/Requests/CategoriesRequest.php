<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:categories,id,' . $id,
                ],
            'name_en' => [
                'required',
                'string',
                'max:255',
                'min:3',
                'unique:categories,id,' . $id,
            ]
        ];
    }
 public function messages()
 {
     return[
         'required' =>__('category.required'),
         'string'   =>__('category.string'),
         'max'      =>__('category.max'),
         'min'      =>__('category.min'),
         'unique'   =>__('category.unique'),
     ];
 }
}
