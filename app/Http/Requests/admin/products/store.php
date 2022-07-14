<?php

namespace App\Http\Requests\admin\products;

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
            "category_id"=>"required",
            "brand_id"=>"required",
            "minimum_quantity"=>"required",
            "tags"=>"required",
            "thumbnail"=>"required",
            "colors"=>"required",
            "curenncy_id"=>"required",
            "unit_price"=>"required",
            "quantity"=>"required",
            "description"=>"required",
            "meta_title"=>"required",
            "meta_description"=>"required",
            "meta_logo"=>"required",
            "low_stock_quantity"=>"required",
            "est_shipping_days"=>"required",
            "tax"=>'required',
            "tax_type"=>"required",



        ];
    }
}
