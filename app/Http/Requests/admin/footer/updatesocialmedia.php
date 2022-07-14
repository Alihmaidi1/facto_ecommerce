<?php

namespace App\Http\Requests\admin\footer;

use Illuminate\Foundation\Http\FormRequest;

class updatesocialmedia extends FormRequest
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

            "copy_right"=>"required",
            "facebook"=>"required",
            "twitter"=>"required",
            "instagram"=>"required",
            "youtube"=>"required",
            "linkedin"=>"required"

        ];
    }
}
