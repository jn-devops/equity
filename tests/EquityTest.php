<?php

use Homeful\Equity\Data\EquityData;
use Homeful\Equity\Equity;

it('has default interest rate, months to pay and monthly amortization and configurable', function () {
    $equity = new Equity;
    $equity->setAmount(60000);
    expect($equity->getAmount()->inclusive()->compareTo(60000))->toBe(0);
    expect($equity->getAnnualInterestRate())->toBe(0.0);
    expect($equity->getMonthsToPay())->toBe(12);
    expect($equity->getMonthlyAmortization()->inclusive()->compareTo(5000))->toBe(0);
    $equity->setMonthsToPay(24);
    expect($equity->getAmount()->inclusive()->compareTo(60000))->toBe(0);
    expect($equity->getMonthsToPay())->toBe(24);
    expect($equity->getAnnualInterestRate())->toBe(0.0);
    expect($equity->getMonthlyAmortization()->inclusive()->compareTo(2500))->toBe(0);
});

it('can set interest rate', function () {
    $equity = new Equity;
    $equity->setAmount(240000)->setInterestRate(1 / 100);
    expect($equity->getAnnualInterestRate())->toBe(0.01);
    expect($equity->getMonthsToPay())->toBe(12);
    expect($equity->getMonthlyAmortization()->inclusive()->compareTo(20108.0))->toBe(0);
});

it('has data from object', function () {
    $equity = new Equity;
    $equity->setAmount(240000)->setInterestRate(1 / 100);
    $data = EquityData::fromObject($equity);
    expect($data->amount)->toBe($equity->getAmount()->inclusive()->getAmount()->toFloat());
    expect($data->interest_rate)->toBe($equity->getAnnualInterestRate());
    expect($data->months_to_pay)->toBe($equity->getMonthsToPay());
    expect($data->monthly_amortization)->toBe($equity->getMonthlyAmortization()->inclusive()->getAmount()->toFloat());
});

it('has data from array', function () {
    $equity = new Equity;
    $equity->setAmount(240000)->setInterestRate(1 / 100);
    $array = EquityData::fromObject($equity)->toArray();
    $data = EquityData::from($array);
    expect($data->amount)->toBe($equity->getAmount()->inclusive()->getAmount()->toFloat());
    expect($data->interest_rate)->toBe($equity->getAnnualInterestRate());
    expect($data->months_to_pay)->toBe($equity->getMonthsToPay());
    expect($data->monthly_amortization)->toBe($equity->getMonthlyAmortization()->inclusive()->getAmount()->toFloat());
});
