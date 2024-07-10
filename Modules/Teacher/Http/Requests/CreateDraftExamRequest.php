<?php

namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDraftExamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string','min:5','max:250'],
            'start_at' => 'required|date',
            'end_at' => ['required','after:start_at'],
            'num_of_questions'=>['required','integer','min:1'],

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
