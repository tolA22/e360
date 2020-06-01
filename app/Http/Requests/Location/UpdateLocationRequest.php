<?php

namespace App\Http\Requests\Location;

use App\Traits\ResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UpdateLocationRequest extends FormRequest
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
            'name'=>'required|unique:locations|max:255',
            // 'old_name'=>'required|max:255|exists:locations,name'
            // 'id'=>'required|exists:locations,id'
        ];
    }

    // public function messages(){
    //     // return ['old_name'=>""]
    // }

    protected function failedValidation(Validator $validator)
    {
       
       throw new HttpResponseException($this->error($validator->errors(),422)) ;
       
    }
}