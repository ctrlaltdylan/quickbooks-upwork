<?php

namespace App\Http\Requests\Role;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RoleCreateRequest
 * @package App\Http\Requests\Role
 */
class RoleEditRequest extends FormRequest
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
        $role_id = $this->route('id');

        return [
            'name'          => 'required|max:255|unique:roles,name,' . $role_id,
            'description'   => 'required|max:255',
            'color'         => 'required|max:255'
        ];
    }
}