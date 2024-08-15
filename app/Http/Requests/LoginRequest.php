<?php

namespace App\Http\Requests;

use App\Traits\ValidatesRequests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use ValidatesRequests;


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ];
    }
}
