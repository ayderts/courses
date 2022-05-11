<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHomeworkRequest extends FormRequest
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
            'course_id' => 'required|integer|exists:courses,id',
            'lesson_id' => 'required|integer|exists:lessons,id',
            'group_id' => 'required|integer|exists:course_groups,id',
            'description' => 'required|string',
            'homework_deadline' => 'required|date',
            'file' => 'string|nullable',
        ];
    }
}
