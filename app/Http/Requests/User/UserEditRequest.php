<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserEditRequest
 * @package App\Http\Requests\User
 */
class UserEditRequest extends FormRequest
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
        $user_id = $this->route('id');

        return [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users,email,' . $user_id,
            'username'      => 'required|max:255|unique:users,username,' . $user_id,
            // 'password'      => 'max:255',
            // TODO: Check if password empty
        ];
    }
}
