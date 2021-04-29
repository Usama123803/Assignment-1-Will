<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	function email()
	{
        $email = \Config\Services::email();

        $email->setFrom('no-reply@daytodata.net', 'My Virtual Repair');
        $email->setTo('will@daytodata.net');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($email->send()) 
        {
            echo 'Email successfully sent';
        } 
        else 
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
        die;
	}

    public function hh()
    {
        $usama = [
                    'title' => 'Header',
                ];
        return view('header',$usama);
    }
}
