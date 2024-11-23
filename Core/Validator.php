<?php

namespace Core;

class Validator
{
    public static function empty(...$values)
    {
        foreach ($values as $value) {
            // $value = trim($value);
            if (empty($value)) {
                return false;
            }
        }
        return true;
    }

    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        $value = trim($value);
        return (bool)filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    
    public static function cin($value)
    {
        $value = trim($value);
        return preg_match('/^[a-z]{2}\d+$/i', $value);
    }
    
    public static function date($value)
    {
        if (! strtotime($value)) {
            return false;
        }

        list($year, $month, $day) = explode('-', $value);

        return checkdate($month, $day, $year);
    }

    public static function phone($value)
    {
        $value = trim($value);
        return preg_match('/^0\d{9}$/i', $value);
    }
}

