<?php
class Pipeline {
    public static function make(...$functions) {
        return function($arg) use ($functions) {
            $result = $arg;

            foreach ($functions as $function) {
                $result = $function($result);
            }
            return $result;
        };
    }
}

// Przykładowe wywołanie make() i zastosowanie zwróconej funkcji:
$pipeline = Pipeline::make(
    function($var) { return $var * 3; },
    function($var) { return $var + 1; },
    function($var) { return $var / 2; }
);

$result = $pipeline(3); // Wywołanie zwróconej funkcji z argumentem 3
echo $result; // Wyświetlenie wyniku: 5
