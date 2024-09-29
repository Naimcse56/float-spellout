<?php

namespace Naimcse56\FloatSpellout\Services;

use Naimcse56\FloatSpellout\Contracts\NumberSpelloutContract;

class FloatNumberSpelloutService implements NumberSpelloutContract
{
    public function convert(float $number): string
    {
        return $this->convertToWords($number);
    }

    private function convertToWords(float $number): string
    {
        $integerPart = intval($number);
        $fractionalPart = round(($number - $integerPart) * 100);

        $integerSpelling = $this->spellInteger($integerPart);
        $fractionalSpelling = $this->spellInteger($fractionalPart);

        return $integerSpelling . ' point ' . $fractionalSpelling;
    }

    private function spellInteger(int $number): string
    {
        // You can implement the logic to convert integer to words, 
        // or use some helper class/package that does this for you.
        // For simplicity, here is a basic example using the NumberFormatter:

        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }
}
