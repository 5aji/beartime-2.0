<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchedule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRoles(['moderator', 'admin']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'date' => 'required|date',
            'blocks' => 'required|array',
            'blocks.*.name' => 'string|required_without:blocks.*.number',
            'blocks.*.number' => 'numeric|distinct',
            'blocks.*.start_time' => 'date_format:H:i:s|required',
            'blocks.*.end_time' => 'date_format:H:i:s|required',
        ];
    }
}
