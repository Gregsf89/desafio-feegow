<?php

namespace App\Rules;

use App\Http\Helpers\CpfHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateCpf implements ValidationRule
{
    /**
     * Error message.
     * @var string
     */
    private string $message = 'invalid_';

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!CpfHelper::validate($value))
            $fail('invalid_' . $attribute);
    }
}
