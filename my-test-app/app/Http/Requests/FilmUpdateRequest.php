<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }



    
    /**
     * @inheritDoc
     */
    protected function prepareForValidation()
    {
        //dd($this->genre);
        //dd($this->genres);
        $this->replace(['genres' => explode(',',  $this->genres)]);
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
              'genres' => 'array'
            // 'title' =>'required|string|max:255',
        ];
    }
}
