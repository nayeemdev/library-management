<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'password' => 'confirmed'
        ];
    }

    public function requestData()
    {
        $requestData = [
            'name' => $this->name,
            'phone' => $this->phone,
        ];

        if ($this->password != null) {
            $requestData['password'] = Hash::make($this->password);
        }

        return $requestData;
    }
}
