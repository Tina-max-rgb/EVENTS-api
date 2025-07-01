<?php
use PHPUnit\Framework\TestCase;
use App\PasswordStrengthCalculator;

class PasswordStrengthCalculatorTest extends TestCase
{
    /**
     * @dataProvider passwordProvider
     */
    public function testCalculateScore(string $password, int $expectedScore)
    {
        $calculator = new PasswordStrengthCalculator();
        $this->assertEquals($expectedScore, $calculator->calculate($password));
    }

    public function passwordProvider(): array
    {
        return [
            ['abc', 2],
            ['abcABC', 4],
            ['abcABC123', 8],
            ['abcABC123!', 10],
            ['12345678', 4],
            ['!!!!', 2],
            ['Ab1!', 8],
            ['abcdefgh', 4],
        ];
    }
}
