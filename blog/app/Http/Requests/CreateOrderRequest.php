<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'title' => 'required',

            'body' => 'required',

            'client' => 'required|min:3',

            'email' => 'required|email',

            'attached_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'remember_token' => 'required'

        ];
    }
}
