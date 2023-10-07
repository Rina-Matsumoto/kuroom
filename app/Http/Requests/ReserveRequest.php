<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
    public function rules()
    {
        return [
            'reserve.reserve_date' => 'required',
            'reserve.time_id' => 'required | numeric',
            'reserve.day_id' => 'required | numeric',
            'reserve.user_name' => 'required',
            'reserve.user_email' => 'required',
            'reserve.text' => 'required',
        ];
    }
}
