<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampSchedule extends FormRequest
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
            'camp_id' => 'required|integer|min:1',
            'title' => 'required|string|min:5|max:100',
            'schedule_at' => 'required|date',
            'comment' => 'required|string:|min:5|max:255'               
        ];
    }
}
