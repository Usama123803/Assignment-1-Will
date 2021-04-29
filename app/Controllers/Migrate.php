<?php

namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{

    public function migrate($version = NULL)
    {

        $outcome = $this->migration->version($version);

        if(is_string($outcome))
        {
            echo "Migration to version $outcome succeeded.";
        }
        elseif($outcome === TRUE)
        {
            echo "No migration was possible. Target version is the same as current version.";
        }
        else
        {
            echo $this->migration->error_string();
        }
    }

    public function latest() //you could this for migration::current() too
    {
        $this->migration->latest();
    }
}