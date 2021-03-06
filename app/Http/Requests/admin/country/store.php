<?php

namespace App\Http\Requests\admin\country;

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
            "country"=>"required",
            "status"=>"required",
            "rank"=>"required",
            "logo"=>"required"
        ];
    }
}
