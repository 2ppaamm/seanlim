<?php

namespace Foobooks\Http\Requests;

use Foobooks\Http\Requests\Request;

class CreateBookRequest extends Request
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
            'synopsis' => 'required',
            'cover' => 'url'
        ];
    }
}
