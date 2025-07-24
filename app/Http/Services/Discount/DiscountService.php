<?php

namespace App\Http\Services\Discount;

use App\Exceptions\NoDiscountFoundException;

class DiscountService 
{
    public function __construct(
        private DiscountFactory $discountFactory,
    ) { 
    }

    public function getValue(array $data): int
    {
        $type = $data['type'];

        try {
            $strategy = $this->discountFactory->getStrategy($type);
            $discount = $strategy->getValue();

            return $discount;
        } catch (NoDiscountFoundException) {
            return 0;
        }
    }
}
