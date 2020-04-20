<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'    => 'required',
            'email'   => 'required|email',
            'tel'     => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => trans('validate Your name'),
            'email.required'   => trans('validate Your email'),
            'email.email'      => trans('validate Form Your email'),
            'tel.required'     => trans('validate Your tel'),
            'message.required' => trans('validate Your message'),
        ];
    }

    public function validationData()
    {
        return $this->all();
    }
}
