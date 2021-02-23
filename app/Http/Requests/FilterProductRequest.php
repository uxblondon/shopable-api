<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class FilterProductRequest extends FormRequest
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
            'category_id' => 'numeric|nullable',
            'title' => 'nullable',
            'status' => [
                'alpha',
                'nullable',
                Rule::in(['draft', 'live']),
            ],
            'sort_by' => [
                'alpha',
                'nullable',
                Rule::in(['title', 'published_at', 'manual_sort_order']),
            ],
            'sort_order' => [
                'alpha',
                'nullable',
                Rule::in(['asc', 'desc']),
            ],
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
