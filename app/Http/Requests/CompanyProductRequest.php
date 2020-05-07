<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProductRequest extends FormRequest
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

    public function messages(){

        return [
            'name.required' =>'Product Name Required',
            'details.required' =>'Product Details Required',
            'price.required' =>'Product Price Required',
            'genericid.required' =>'Product Generic Required',
            'typeid.required' =>'Product Type Required',
            'mrp.required' =>'Product mrp Required',
            'unitperbox.required' =>'Unit Per Box Required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"    => "required" ,
            "details"    => "required" ,
            "price"    => "required" ,
            "genericid"    => "required" ,
            "typeid"    => "required" ,
            "mrp"    => "required" ,
            "unitperbox"    => "required" ,
        ];
    }
}
