<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'Bodymessage' => 'required|email|max:255',
        ];
    }

    public function messages() {
        return [
         'name.required' => 'You need to enter your Name',
         'email.required' => 'You need to enter your Email',
         'Bodymessage.required' => 'You need to enter your Message',
        ];
    }
}
