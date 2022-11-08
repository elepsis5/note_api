<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|',
            'company' => '',
            'phone' => 'required|min:11|max:11',
            'email' => 'required|min:1|max:10',
            'birthday' => '',
            'photo' => ''
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'id' => 'required|integer|exists:notes,id',
                ] + $rules;
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:notes,id'
                ];
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function all($keys = null)
    {
        $data = parent::all($keys);
        switch ($this->getMethod())
        {
            case 'DELETE':
                $data['id'] = $this->route('id');
        }
        return $data;
    }

    /**
     * Rewrite error's messages.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле name является обязательным',
            'phone.required' => 'Поле phone является обязательным',
            'email.required' => 'Поле email является обязательным'
        ];
    }
}
