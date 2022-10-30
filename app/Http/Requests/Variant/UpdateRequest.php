<?php

namespace App\Http\Requests\Variant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
           
            'referer' 	    =>	 ['sometimes','string','min:1','max:100'],
            'descriptions' 	=>	 ['sometimes','string','min:3','max:30'],
            'price' 	    =>	 ['sometimes','numeric'],
            'product_id'    =>	 ['required','exists:products,id'],
        ];
    }
}