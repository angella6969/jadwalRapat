<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YouTubeValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages()
    {
        return [
            'youtube_code.required' => 'Kode YouTube diperlukan.',
            'youtube_code.regex' => 'Kode YouTube tidak valid.',
        ];
    }
    public function rules(): array
    {
        return [
            'youtube_code' => 'required|regex:/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+$/',
        ];
    }
}
