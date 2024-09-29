<?php

namespace Naimcse56\FloatSpellout\Contracts;

interface NumberSpelloutContract
{
    public function convert(float $number): string;
}
