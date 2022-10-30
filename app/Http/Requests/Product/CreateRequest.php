<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class createRequest extends FormRequest
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
                'name' 	        =>	 ['required','string','min:1', 'max:50'],
                'referer' 	    =>	 ['required','string','min:1','max:100'],
                'descriptions' 	=>	 ['required','string','min:3','max:30'],
                'price' 	    =>	 ['required','numeric'],
        ];
    }
}

