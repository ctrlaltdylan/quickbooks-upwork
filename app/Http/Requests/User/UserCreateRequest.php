<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserCreateRequest
 * @package App\Http\Requests\User
 */
class UserCreateRequest extends FormRequest
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
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users,email',
            'username'      => 'required|max:255|unique:users,username',
            'password'      => 'required|max:255|confirmed',
        ];
    }
}
