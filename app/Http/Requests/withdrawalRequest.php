<?php

namespace App\Http\Requests;

use App\Rules\isEnoughAmount;
use Illuminate\Foundation\Http\FormRequest;

class withdrawalRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "amount" => ['required', 'numeric', new isEnoughAmount],
            "account" => ['required', 'email', 'exists:users,email']
        ];
    }
}
