<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VideoTypesRule implements Rule
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
        $user_types = explode(',',$value);
        $types = config('constants.VIDEO_TYPES_ARRAY');

        foreach($user_types as $user_type){
            if(!in_array(trim($user_type), $types)){
                return false;
            }
        }
        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must come from Gratitude Share, WOW Share, CX Tip, Sales Tip, or WIN Share.';
    }
}
