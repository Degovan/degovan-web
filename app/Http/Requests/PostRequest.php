<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'category_post_id'  => 'required|numeric',
            'title'             => 'required|string|max:255',
            'body'              => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_post_id.required' => 'Kategori Artikel tidak boleh kosong',
            'category_post_id.numeric'  => 'Kategori Artikel harus menggunakan angka',
            'title.required'            => 'Judul tidak boleh kosong',
            'title.string'              => 'Judul harus bersifat karakter (text)',
            'title.max'                 => 'Judul maksimal 255 karakter',
            'body.required'             => 'Isi tidak boleh kosong',
            'body.string'               => 'Isi harus bersifat karakter (text)',
        ];
    }
}
