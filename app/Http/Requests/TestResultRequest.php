<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestResultRequest extends FormRequest
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
            'test_id' => 'required|integer',
            'is_passed' => 'required|string',
            'score' => 'required|integer',

        ];
    }
}
