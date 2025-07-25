<?php

namespace App\Entities;

use Error;

class OnlineFax extends Fax
{
    public function print()
    {
        throw new Error("Online fax can't print!");
    }
}
