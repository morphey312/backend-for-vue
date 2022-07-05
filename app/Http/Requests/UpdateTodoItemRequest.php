<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoItemRequest extends FormRequest
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
        $requestData = request()->all();
        return [
            'id' => ['required'],
            'description' => ['required', 'string', 'min:5', 'max:255'],
            'day_of_week' => ['required', 'integer', 'min:0', 'max:6'],
        ];
    }
}
