<?php

namespace App\Entities;

class OnlineFax extends Fax
{
    public function process()
    {
        return 'Sending document via email';
    }
}
