<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyChangePasswordRequest extends FormRequest
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
            'companyOldPassword.required' =>'Enter Your Current Password',
            'companyNewPassword.required' =>'Enter A New Password',
            'companyConPassword.required' =>'Confirm New Password',
            'companyNewPassword.min' => 'New Password Must Contain Minimum 6 Characters',
            'companyNewPassword.max' => 'New Password Can Contain Maximum 20 Characters',
            'companyConPassword.same' => 'Confrim Password Must Match New Password'
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
            "companyOldPassword"    => "required" ,
            "companyNewPassword"    => "required | min:6 |max:20",
            "companyConPassword"    => "required | same:companyNewPassword"
        ];
    }
}
