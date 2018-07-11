<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' 		=> 'required|max:100',
            'email'    	=> 'required|email|max:150|unique:users,email',
            'password'  => 'required|max:32',
            'type_user' => 'integer|between:0,1',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' 		=> 'required|max:100',
            'password'  => 'required|max:32',
            'type_user' => 'integer|between:0,1',
        ],
    ];

    /**
     * Set data to validate
     *
     * @param array $data
     * @return $this
     */
    public function with(array $data)
    {
        if(!empty($data['id'])){
            $this->rules[ValidatorInterface::RULE_UPDATE]['email'] = "email|max:150|unique:users,email,".$data['id'];
        }
        $this->data = $data;
        return $this;
    }
}
