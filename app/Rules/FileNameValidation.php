<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileNameValidation implements Rule
{
    public function passes($attribute, $value)
    {
        $extension = strtolower($value->getClientOriginalExtension());
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        return in_array($extension, $allowedExtensions);
    }

    public function message()
    {
        return 'The :attribute must have a valid extension (png, jpg, jpeg).';
    }
}
