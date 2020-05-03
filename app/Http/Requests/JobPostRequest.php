<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
            'title'=>'required|min:10',
            'description'=>'required',
            'roles'=>'required',
            'address'=>'required',
            'position'=>'required',
            'last_date'=>'required',
            'number_of_vacancy'=>'required|numeric',
            'experience'=>'required|numeric'
        ];
    }
}
