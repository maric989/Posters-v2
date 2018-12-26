<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePosterRequest extends FormRequest
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
            'posterImg' => 'required|mimes:gif,png,jpg|size:max:5000',
            'title'     => 'required'
        ];
    }

    public function messages()
    {
        return [
          'posterImg.size'    => 'Fajl mora biti manji od 5 Mb',
          'posterImg.mimes'   => 'Nije dobar format',
          'posterImg.require' => 'Morate dodati sliku',
          'title.required' => 'Morate staviti naslov'
        ];
    }
}
