<?php

class Environments
{
    public static function load($dir)
    {
        if (!file_exists($dir . '/.env')) {
            return false;
        } else {
            $lines = file($dir . '/.env');
            foreach ($lines as $line) {
                putenv(trim($line));
            }
        }
    }
}
