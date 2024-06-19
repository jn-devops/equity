<?php

namespace Homeful\Equity\Data;

use Brick\Math\Exception\MathException;
use Brick\Math\Exception\NumberFormatException;
use Brick\Math\Exception\RoundingNecessaryException;
use Brick\Money\Exception\MoneyMismatchException;
use Brick\Money\Exception\UnknownCurrencyException;
use Homeful\Equity\Equity;
use Spatie\LaravelData\Data;

class EquityData extends Data
{
    public function __construct(
        public float $amount,
        public int $months_to_pay,
        public float $interest_rate,
        public float $monthly_amortization,
    ) {}

    /**
     * @throws MathException
     * @throws MoneyMismatchException
     * @throws NumberFormatException
     * @throws RoundingNecessaryException
     * @throws UnknownCurrencyException
     */
    public static function fromObject(Equity $equity): self
    {
        return new self(
            amount: $equity->getAmount()->inclusive()->getAmount()->toFloat(),
            months_to_pay: $equity->getMonthsToPay(),
            interest_rate: $equity->getAnnualInterestRate(),
            monthly_amortization: $equity->getMonthlyAmortization()->inclusive()->getAmount()->toFloat()
        );
    }
}
