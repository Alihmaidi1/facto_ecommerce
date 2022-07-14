<?php

namespace App\Http\Requests\admin\banner;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            "title"=>"required",
            "url"=>"required",
            "type"=>"required",
            "status"=>"required",
            "message_error"=>"required",
            "rank"=>"required",
            "description"=>"required",
            "logo"=>'required'

        ];
    }
}