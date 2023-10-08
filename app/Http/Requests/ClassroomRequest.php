<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ClassroomRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
       return [
            'classroom.classroom_name' => 'required',
            'classroom.min_reserve_num' => 'required | numeric',
            'classroom.day_id' => 'required | numeric',
            'classroom.time_id' => 'required | numeric',
        ];
    }
}