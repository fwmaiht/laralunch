<?php

namespace App\Services;

class CheckFormData {
    public static function selectGenre($Lunch) {

        if ($Lunch->genre === 1) {
            $genre = '和食';
        }
        if ($Lunch->genre === 2) {
            $genre = '洋食';
        }
        if ($Lunch->genre === 3) {
            $genre = '中華';
        }
        if ($Lunch->genre === 4) {
            $genre = 'ラーメン';
        }
        if ($Lunch->genre === 5) {
            $genre = 'カレー';
        }
        if ($Lunch->genre === 6) {
            $genre = 'ピザ';
        }
        if ($Lunch->genre === 7) {
            $genre = '定食';
        }

        return $genre;
    }
}
