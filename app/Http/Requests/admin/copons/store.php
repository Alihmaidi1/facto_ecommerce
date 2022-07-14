<?php

namespace App\Http\Requests\admin\copons;

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

            "name"=>"required",
            "code"=>"required",
            "logo"=>"required",
            "value"=>"required",
            "type"=>"required",
            "date_start_at"=>"required",
            "date_end_at"=>"required",


        ];
    }
}
