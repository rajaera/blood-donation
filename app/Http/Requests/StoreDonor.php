<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonor extends FormRequest
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
            //'first_name' => 'required',
            //'last_name' => 'min:3|max:50',

            //'address1' => 'required',
            //'address2' => 'min:3|max:50',
           // 'address3' => 'min:3|max:50',
          //  'city' => 'min:3|max:50',

            //'contact_number' => 'required',
           // 'identity_number' => 'required',

            //'gender' => 'required',

        ];
    }
}
