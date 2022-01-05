<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhysiqueRequest extends FormRequest
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
            'kilograms' => 'required',
            'deadlift' => 'nullable',
            'benchpress' => 'nullable',
            'squat' => 'nullable',
            'comment' => 'required',
            'physique' => 'required',
            'physique.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
