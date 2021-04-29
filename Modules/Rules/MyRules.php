<?php namespace Modules\Rules;

class MyRules
{
	public function test_validate(string $str, string &$error = null): bool
    {
        $error = 'test error';
        return false;
    }
}