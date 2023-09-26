<?php

namespace App\Rules;

use Closure;
use App\Models\Account;
use Illuminate\Contracts\Validation\ValidationRule;

class isEnoughAmount implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $account = Account::where('user_id', auth()->user()->id)->first();

        if ($value > intval($account->amount)) {
            $fail('Le montant saisi n\'est pas suffisant.');
        }

    }
}
