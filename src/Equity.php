<?php

namespace Homeful\Equity;

use Brick\Math\RoundingMode;
use Brick\Money\Money;
use Jarouche\Financial\PMT;
use Whitecube\Price\Price;

class Equity
{
    protected Price $amount;

    protected int $months_to_pay;

    protected float $interest_rate;

    /**
     * @return $this
     *
     * @throws \Brick\Math\Exception\NumberFormatException
     * @throws \Brick\Math\Exception\RoundingNecessaryException
     * @throws \Brick\Money\Exception\UnknownCurrencyException
     */
    public function setAmount(Price|float $amount): Equity
    {
        $this->amount = $amount instanceof Price
            ? $amount
            : new Price(Money::of($amount, 'PHP'));

        return $this;
    }

    public function getAmount(): Price
    {
        return $this->amount;
    }

    /**
     * @return $this
     *
     * @throws \Exception
     */
    public function setMonthsToPay(int $months_to_pay): Equity
    {
        if ($months_to_pay < 12) {
            throw new \Exception('Equity months to pay must be greater than or equal to 12 months.');
        }
        if ($months_to_pay > 36) {
            throw new \Exception('Equity months to pay must be less than or equal to 36 months.');
        }
        $this->months_to_pay = $months_to_pay;

        return $this;
    }

    public function getMonthsToPay(): int
    {
        return $this->months_to_pay ?? config('equity.default_months_to_pay');
    }

    /**
     * @return $this
     *
     * @throws \Exception
     */
    public function setInterestRate(float $interest_rate): Equity
    {
        if ($interest_rate < 1 / 100) {
            throw new \Exception('Equity months to pay must be greater than or equal to 1%.');
        }
        if ($interest_rate > 12) {
            throw new \Exception('Equity months to pay must be less than or equal to 12%');
        }

        $this->interest_rate = $interest_rate;

        return $this;
    }

    public function getAnnualInterestRate(): float
    {
        return $this->interest_rate ?? config('equity.default_interest_rate');
    }

    protected function getMonthlyInterestRate(): float
    {
        return $this->getAnnualInterestRate() / 12;
    }

    /**
     * @throws \Exception
     */
    public function getMonthlyAmortization(): Price
    {
        $amount = $this->getAmount()->inclusive()->getAmount()->toFloat();
        $months_to_pay = $this->getMonthsToPay();

        return $this->getMonthlyInterestRate() > 0
            ? with(new PMT($this->getMonthlyInterestRate(), $months_to_pay, $amount), function ($obj) {
                $float = round($obj->evaluate());

                return new Price(Money::of($float, 'PHP', roundingMode: RoundingMode::CEILING));
            })
            : new Price(Money::of($amount / $months_to_pay, 'PHP', roundingMode: RoundingMode::CEILING));
    }
}
