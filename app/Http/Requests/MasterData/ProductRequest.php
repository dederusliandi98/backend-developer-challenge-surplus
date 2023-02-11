<?php

namespace App\Http\Requests\MasterData;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'enable' => 'required',
        ];
    }
    
    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(
            response()->json([
                'code' => config('constants.HTTP.CODE.UNPROCESS'),
                'is_success' => config('constants.STATUS.SUCCESS.FALSE'),
                'message' => 'all field is required, check your input!',
                'data' => $validator->messages()->all()
            ], 200)
        ); 
    }
}
