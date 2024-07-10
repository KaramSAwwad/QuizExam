<?php

namespace Modules\Teacher\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\Constant\Models\Speciality;

class SignUpRequest extends FormRequest
{
    public function specialities(){
        $specialities = Speciality::withoutTrashed()->select('id')->get();
        foreach ($specialities as $speciality) {
            $array[] = $speciality->id;
        }
        return $array;
    }

    public function rules(): array
    {
        $data = $this->specialities();
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'mobile' => 'required|string|max:255|unique:teachers',
            'password' => 'required|string|min:8',
            'speciality_id'=> ['required',Rule::in($data)],
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
