<?php

namespace Benjacho\BelongsToManyField\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ArrayRules implements ValidationRule
{
    public $rules = [];

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $rules)
    {
        array_push($rules, 'array');
        $this->rules = $rules;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $input = [$attribute => json_decode($value, true)];
        $rules = [$attribute => $this->rules];
        $validator = \Validator::make($input, $rules, $this->messages($attribute));

        if ($validator->fails()) {
            foreach ($validator->errors()->get($attribute) as $message) {
                $fail($message);
            }
        }
    }

    public function messages($attribute)
    {
        return [
            /*   "size" => __('Select exactly') . ' :size',
              "min" => __('Select a minimum of') . ' :min',
              "max" => __('Select a maximum of') . ' :max', */
        ];
    }
}
