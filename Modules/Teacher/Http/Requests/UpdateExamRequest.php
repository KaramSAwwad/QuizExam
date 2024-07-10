<?php

namespace Modules\Teacher\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $now = Carbon::now()->addMinutes(10);
        return [
            'title'=>['required','string','min:5','max:250'],
            'start_at' => ['nullable','date'],
            'end_at' => ['required','after:start_at','after:'.$now],
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
