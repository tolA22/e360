<?php

namespace App\Http\Requests\Tank;
use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateTankRequest extends FormRequest
{
    use ResponseTrait;
    
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
            
            'location_id'=>'exists:locations,id'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
       
       throw new HttpResponseException($this->error($validator->errors(),422)) ;
       
    }
}