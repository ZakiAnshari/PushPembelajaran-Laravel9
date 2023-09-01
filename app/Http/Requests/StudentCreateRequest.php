<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'nobp' => 'unique:students|max:10',
            'name' => 'max:20'
        ];
    }

    public function attributes()
    {
        return[
            'class_id' =>'class',
        ];
    }
    
    public function messages()
    {
        return [
            'nobp.required'=>'NoBp Wajib Diisi',
            'nobp.max'=>'nobp maksimal 8 karakter'
        ];
    }

}
