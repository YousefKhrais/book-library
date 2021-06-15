<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name' => 'required|string',
            'author_id' => 'required|integer',
            'publisher_id' => 'required|integer',
            'category_id' => 'required|integer',
            'version' => 'required|integer',
            'release_date' => 'required|date',
            'image_url' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',

            'author_id.required' => 'Author is required',
            'author_id.integer' => 'author_id must be a integer',

            'publisher_id.required' => 'Publisher required',
            'publisher_id.integer' => 'publisher_id must be a integer',

            'category_id.required' => 'Category is required',
            'category_id.integer' => 'category_id must be a integer',

            'version.required' => 'Version is required',
            'version.integer' => 'Version must be a integer',

            'release_date.required' => 'Release Date is required',
            'release_date.date' => 'Release Date must be a Date',

            'image_url.required' => 'Release Date is required',
        ];
    }
}
