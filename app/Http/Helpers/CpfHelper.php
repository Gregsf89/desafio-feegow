<?php

namespace App\Http\Helpers;

class CpfHelper
{
    public static function validate(string $cpf): bool
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) != 11)
            return false;

        if (preg_match('/(\d)\1{10}/', $cpf))
            return false;

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++)
                $d += $cpf[$c] * (($t + 1) - $c);

            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d)
                return false;
        }

        return true;
    }

    /**
     * Generate a new valid Cpf
     * @return string
     */
    public static function generate(): string
    {
        $n1 = mt_rand(0, 9);
        $n2 = mt_rand(0, 9);
        $n3 = mt_rand(0, 9);
        $n4 = mt_rand(0, 9);
        $n5 = mt_rand(0, 9);
        $n6 = mt_rand(0, 9);
        $n7 = mt_rand(0, 9);
        $n8 = mt_rand(0, 9);
        $n9 = mt_rand(0, 9);
        $d1 = $n9 * 2 + $n8 * 3 + $n7 * 4 + $n6 * 5 + $n5 * 6 + $n4 * 7 + $n3 * 8 + $n2 * 9 + $n1 * 10;

        $d1 = 11 - (self::mod($d1, 11));
        if ($d1 >= 10)
            $d1 = 0;

        $d2 = $d1 * 2 + $n9 * 3 + $n8 * 4 + $n7 * 5 + $n6 * 6 + $n5 * 7 + $n4 * 8 + $n3 * 9 + $n2 * 10 + $n1 * 11;
        $d2 = 11 - (self::mod($d2, 11));
        if ($d2 >= 10)
            $d2 = 0;

        $retorno = "{$n1}{$n2}{$n3}{$n4}{$n5}{$n6}{$n7}{$n8}{$n9}{$d1}{$d2}";

        return $retorno;
    }

    /**
     * @param int $dividendo
     * @param int $divisor
     * @return int
     */
    private static function mod($dividendo, $divisor): int
    {
        return round($dividendo - floor($dividendo / $divisor) * $divisor);
    }
}