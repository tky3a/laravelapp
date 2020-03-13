<?php
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator 
{
  public function validateHello($attributes, $value, $parameters)
  {
    return $value % 2 == 0 ;
  }
}