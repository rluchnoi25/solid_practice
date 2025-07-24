<?php

namespace App\Http\Services\Discount\Strategies\Contracts;

interface DiscountStrategyInterface
{
    public function supports(string $type): bool;
    public function getValue(): int;
}
