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
            'weight' => 'required|numeric|gt:0',
            'benchpress' => 'nullable|numeric|gt:0',
            'deadlift' => 'nullable|numeric|gt:0',
            'squat' => 'nullable|numeric|gt:0',
            'comment' => 'required',
            'physique' => 'required',
            'physique.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
