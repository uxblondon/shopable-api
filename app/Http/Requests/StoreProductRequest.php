<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
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
            'category_id' => ['nullable'],
            'title' => 'required',
            'standfirst' => 'nullable',
            'description' => 'required',
            'tags' => 'nullable',
        ];
    }
    
    /**
     * Throws the validation errors
     * @return JSON 
     */
    protected function failedValidation(Validator $validator)
    {
        $data = array(
            'status' => 'error',
            'message' => 'Invalid Request',
            'errors' => $validator->errors()
        );

        throw new HttpResponseException(response()->json($data, 422));
    }

}
