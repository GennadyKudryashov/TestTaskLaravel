<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class FilmUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
        return true;
    }



    
    /**
     * @inheritDoc
     */
    protected function prepareForValidation():void
    {
        $ids = Str::trim($this->genres,'[]');
        $ids = Str::replace('"','',$ids);
        
        $this->merge(['genres' => explode(',',  $ids)]);
    }
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
              'name' => 'required|string|max:250',
              'genres' => 'array',
              'published' =>'required'
           
        ];
    }
}
