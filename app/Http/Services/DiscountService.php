<?php

namespace App\Http\Services;

use App\Enums\DiscountTypes;

class DiscountService 
{
    public function getValue(array $data): int
    {
        $type = $data['type'];
        
        if ($type === DiscountTypes::TYPEONE) {
            return 1;
        }

        if ($type === DiscountTypes::TYPETWO) {
            return 2;
        }

        if ($type === DiscountTypes::STUDENT) {
            return 5;
        }

        if ($type === DiscountTypes::VIP) {
            return 10;
        }

        return 0;
    }
}