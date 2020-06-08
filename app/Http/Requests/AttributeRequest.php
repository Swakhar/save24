<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
          'name' => 'required|max:255|unique:attributes',
          'code' => 'required|max:255|unique:attributes',
        ];
    }

    protected function prepareForValidation()
    {
        $code = strtolower(str_replace(' ', '_', $this->name));

        $this->attributes->replace([
            'code' => $code
        ]);

        $this->merge([
            'code' => $code,
        ]);
    }

    public function messages()
    {
        return [
            'name.required' => 'Attribute Name is required',
            'code.required'  => 'Attribute Code is required',
            'name.unique' => 'Attribute Name is unique',
            'code.unique'  => 'Attribute Code is unique',
        ];
    }
}
