<?php
$gpios = [
    'Gpio 0' => 0,
    'Gpio 1' => 1,
    'Gpio 4' => 4,
    'Gpio 6' => 6
];

$html = '';

foreach ($gpios as $name => $gpio) {
    $html .= '<li class="collection-item">';
    //gpio status on load
    $status = array(0);
    for ($i = 0; $i < count($status); $i++) {
        //config gpio mode and read state
        system("gpio mode " . $gpio . " out");
        exec("gpio read " . $gpio, $status[$i], $return);

        //render switch button
        $html .= '<div class="switch">' .
            '<label class="gpio-btn">' . $name;
        //off
        if ($status[$i][0] == 0) {
            $html .= '<input value=' . $gpio . ' type="checkbox">';
        }
        //on
        if ($status[$i][0] == 1) {
            $html .= '<input value=' . $gpio . ' type="checkbox" checked>';
        }
        $html .= '<span class="lever"></span>' .
            '</label>' .
            '</div>' .
            '</li>';
    }
}
echo $html;
