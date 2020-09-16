<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInventoryRequest extends FormRequest
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
            'medicinename.required' =>'Medicine name Required',
            'batch.required' =>'Batch no. Required',
            'box.required' =>'Quantity Required'
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
            "medicinename"     => "required",
            "batch"     => "required",
            "box" => "required"
        ];
    }
}
