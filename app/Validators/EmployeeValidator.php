<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class EmployeeValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|min:3',
            'password' => 'sometimes|min:6',
            'phone' => 'required|numeric|unique:employees',
            'sex' => 'numeric',
            'salary' => 'numeric'
        ],
   ];
}
