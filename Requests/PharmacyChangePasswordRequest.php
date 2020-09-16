<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyChangePasswordRequest extends FormRequest
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
            'pharmacyOldPassword.required' =>'Enter Your Current Password',
            'pharmacyNewPassword.required' =>'Enter A New Password',
            'pharmacyConPassword.required' =>'Confirm New Password',
            'pharmacyNewPassword.min' => 'New Password Must Contain Minimum 6 Characters',
            'pharmacyNewPassword.max' => 'New Password Can Contain Maximum 20 Characters',
            'pharmacyConPassword.same' => 'Confrim Password Must Match New Password'
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
            "pharmacyOldPassword"    => "required" ,
            "pharmacyNewPassword"    => "required | min:6 |max:20",
            "pharmacyConPassword"    => "required | same:pharmacyNewPassword"
        ];
    }
}
