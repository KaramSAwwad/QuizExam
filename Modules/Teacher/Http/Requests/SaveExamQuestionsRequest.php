<?php

namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveExamQuestionsRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'questions.*.title' => 'required|min:5|max:255',
            'questions.*.mark' => 'required|numeric|min:0.25',
            'questions.*.image' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048',
            'questions.*.text' => 'required|min:5|max:255',
            'questions.*.answer' => 'required|min:1|max:255',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
