<?php

function buildMathTree($str)
{
    $stack = array();
    $out = array();

    $prior = array(
        "^" => array("prior" => "4"),
        "*" => array("prior" => "3"),
        "/" => array("prior" => "3"),
        "+" => array("prior" => "2"),
        "-" => array("prior" => "2"),
    );

    $token = preg_replace("/\s/", "", $str);
    $token = str_replace(",", ".", $token);
    $token = str_split($token);


    if (preg_match("/[\+\-\*\/\^]/", $token['0'])) {
        array_unshift($token, "0");
    }

    $lastnum = TRUE;
    foreach ($token as $key => $value) {

        if (preg_match("/[\+\-\*\/\^]/", $value)) {
            $endop = FALSE;

            while ($endop != TRUE) {
                $lastop = array_pop($stack);

                if ($lastop == "") {
                    $stack[] = $value;
                    $endop = TRUE;
                } else {
                    /* Получим приоритет */
                    $curr_prior = $prior[$value]['prior'];
                    $prev_prior = $prior[$lastop]['prior'];


                    switch ($curr_prior) {
                        case ($curr_prior > $prev_prior):
                            $stack[] = $lastop;
                            $stack[] = $value;
                            break;

                        case ($curr_prior <= $prev_prior):
                            $out[] = $lastop;
                            break;
                    }

                    break;

                }
            }
            $lastnum = false;
        } elseif (preg_match("/[0-9\.]/", $value)) {
            if ($lastnum == TRUE) {
                $num = array_pop($out);
                $out[] = $num . $value;
            } else {
                $out[] = $value;
                $lastnum = TRUE;
            }
        } elseif ($value == "(") {
            $stack[] = $value;
            $lastnum = FALSE;
        } elseif ($value == ")") {
            $bracket = FALSE;
            while ($bracket != TRUE) {
                $op = array_pop($stack);

                if ($op == "(") {
                    $bracket = TRUE;
                } else {
                    $out[] = $op;
                }


            }

            $lastnum = FALSE;
        }

    }

    while ($stack_el = array_pop($stack)) {
        $out[] = $stack_el;
    }

    $notation_str = implode(" ", $out);

    print_r($out);

    return $notation_str;
}

$str = "+(5+3^2)*(19+222/4^2)"; // выражение для примера
echo buildMathTree($str);