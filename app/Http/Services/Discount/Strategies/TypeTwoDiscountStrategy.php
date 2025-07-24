<?php

namespace App\Http\Services\Discount\Strategies;

use App\Enums\DiscountTypes;
use App\Http\Services\Discount\Strategies\Contracts\DiscountStrategyInterface;

class TypeTwoDiscountStrategy implements DiscountStrategyInterface
{
    public function supports(string $type): bool
    {
        return $type === DiscountTypes::TYPETWO->value;
    }

    public function getValue(): int
    {
        return 2;
    }
}
