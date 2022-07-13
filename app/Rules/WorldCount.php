<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WorldCount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count(strip_tags($value)) > 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'حبيبي خود راحتك في التعبير ايش بدنا نعمل في ال 3 كلمات تبعونك';
    }
}
