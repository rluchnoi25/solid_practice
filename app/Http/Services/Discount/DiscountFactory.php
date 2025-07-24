<?php

namespace App\Http\Services\Discount;

use App\Exceptions\NoDiscountFoundException;
use App\Http\Services\Discount\Strategies\Contracts\DiscountStrategyInterface;
use App\Http\Services\Discount\Strategies\StudentDiscountStrategy;
use App\Http\Services\Discount\Strategies\TypeOneDiscountStrategy;
use App\Http\Services\Discount\Strategies\TypeTwoDiscountStrategy;
use App\Http\Services\Discount\Strategies\VIPDiscountStrategy;

class DiscountFactory
{
    private array $strategies;

    public function __construct() 
    {
        $this->strategies = [
            new StudentDiscountStrategy(),
            new TypeOneDiscountStrategy(),
            new TypeTwoDiscountStrategy(),
            new VIPDiscountStrategy(),
        ];
    }

    public function getStrategy(string $type): DiscountStrategyInterface
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($type)) {
                return $strategy;
            }
        }

        throw new NoDiscountFoundException();
    }
}
