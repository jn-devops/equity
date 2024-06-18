<?php

use Homeful\Equity\Equity;

it('has default interest rate, months to pay and monthly amortization', function () {
    $equity = new Equity;
    $equity->setAmount(240000)->setInterestRate(1/100);
    expect($equity->getAnnualInterestRate())->toBe(0.01);
    expect($equity->getMonthsToPay())->toBe(12);
//    dd($equity->getMonthlyAmortization()->inclusive()->getAmount()->toFloat());
    expect($equity->getMonthlyAmortization()->inclusive()->compareTo(20108.0))->toBe(0);
});
