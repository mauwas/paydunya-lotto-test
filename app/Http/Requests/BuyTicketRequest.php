<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class BuyTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'buy_date' => Carbon::now(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'numbers' => ['required', 'array', 'size:7'],
            'numbers.*' => ['required', 'integer', 'min:1', 'max:50', 'distinct'],
        ];
    }

    public function messages()
    {
        $messages = [
            'numbers.required' => 'Veuillez sélectionner 7 numéros.',
            'numbers.size' => 'Vous devez sélectionner exactement 7 numéros.',
        ];

        foreach ($this->input('numbers') as $key => $number) {
            $messages["numbers.$key.required"] = 'Le numéro '.($key + 1).' est requis.';
            $messages["numbers.$key.integer"] = 'Le numéro '.($key + 1).' doit être un entier.';
            $messages["numbers.$key.min"] = 'Le numéro '.($key + 1).' doit être au moins 1.';
            $messages["numbers.$key.max"] = 'Le numéro '.($key + 1).' doit être au maximum 50.';
            $messages["numbers.$key.distinct"] = 'Le numéro '.($key + 1).' doit être unique parmi les 7 numéros.';
        }

        return $messages;
    }
}
