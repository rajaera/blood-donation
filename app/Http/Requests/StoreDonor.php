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
            'first_name' => 'required|string',
            'last_name' => 'string|min:3',
            'address1' => 'required|string',
            'address2' => 'string|max:50',
            'address3' => 'string|max:50',
            'city' => 'string|max:50',
            'contact_number' => 'required|string|min:9|max:12',
            'identity_number' => 'required|string:|min:9|max:15',
            'gender' => 'required|string|min:4|max:6',
            'blood_group_id' => 'integer',
            'source_id' => 'integer',

        ];
    }
}
