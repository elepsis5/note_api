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
                        'id' => 'required|integer|exists:notes,id', //должен существовать. Можно вот так: unique:games,id,' . $this->route('game'),
                ] + $rules; // и берем все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:notes,id'
                ];
        }
    }

    public function all($keys = null)
    {
        // return $this->all();
        $data = parent::all($keys);
        switch ($this->getMethod())
        {
            // case 'PUT':
            // case 'PATCH':
            case 'DELETE':
                $data['date'] = $this->route('day');
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
