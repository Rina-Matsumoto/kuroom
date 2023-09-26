<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $validate = [];

        $validate += [
            'classroom_id' => [
                Rule::exists('classrooms')->where(function ($query) use ($request) {
                    $query->where([
                        ['classroom_id', $request->classroom_id],
                        ['day_id', $request->day_id],
                        ['time_id', $request->time_id]
                    ]);
                })
            ]
        ];

        return $validate;
    }
}
