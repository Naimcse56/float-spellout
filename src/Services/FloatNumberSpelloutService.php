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
        // Split the number into integer and fractional parts
        $integerPart = intval($number);
        $fractionalPart = explode('.', strval($number))[1] ?? '0';

        // Convert integer part to words
        $integerSpelling = $this->spellInteger($integerPart);

        // Convert fractional part to individual digit words
        $fractionalSpelling = $this->spellFractionDigits($fractionalPart);

        return $integerSpelling . ' point ' . $fractionalSpelling;
    }

    private function spellInteger(int $number): string
    {
        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }

    private function spellFractionDigits(string $fractionalPart): string
    {
        $digits = str_split($fractionalPart);
        $digitWords = [];

        foreach ($digits as $digit) {
            $digitWords[] = $this->spellDigit(intval($digit));
        }

        return implode(' ', $digitWords);
    }

    private function spellDigit(int $digit): string
    {
        $formatter = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
        return $formatter->format($digit);
    }
}
