<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class FileNameValidation implements Rule
{
    public function passes($attribute, $value)
    {
        if (!($value instanceof UploadedFile)) {
            return false;
        }
        $originalExtension = strtolower($value->getClientOriginalExtension());
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        if (!in_array($originalExtension, $allowedExtensions)) {
            return false;
        }

        $dotCount = substr_count($value->getClientOriginalName(), '.');
        return $dotCount === 1;
    }

    public function message()
    {
        return 'The :File formate is Invalid !';
    }
}
