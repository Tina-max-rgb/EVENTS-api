<?php
use PHPUnit\Framework\TestCase;
use App\DiscountService;

class DiscountServiceTest extends TestCase
{
    public function testThrowsExceptionForInvalidPercentage()
    {
        $service = new DiscountService();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Percentage must be between 0 and 100.');
        $service->applyDiscount(100, -10);
    }
}
