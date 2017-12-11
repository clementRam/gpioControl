<!-- All gpio 'name' => ID   -->
<?php
$gpios = [
    'Gpio 0' => 0,
    'Gpio 1' => 1,
    'Gpio 4' => 4,
    'Gpio 6' => 6
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ee6e73"/>
    <title>Raspberry - gpio</title>

    <link href="bower_components/materialize/dist/css/materialize.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Gpio - Control</a>
    </div>
</nav>
<main>
    <div class="container">
        <div class="row">
            <div class="col offset-l4 l4 offset-m3 m6 s12">
                <ul class="collection">
                    <?php
                    foreach ($gpios as $name => $gpio) {
                        echo('<li class="collection-item">');
                        //gpio status on load
                        $status = array(0);
                        for ($i = 0; $i < count($status); $i++) {
                            //config gpio mode and read state
                            system("gpio mode " . $gpio . " out");
                            exec("gpio read " . $gpio, $status[$i], $return);

                            //render switch button
                            echo('<div class="switch">' .
                                '<label class="gpio-btn">' . $name);
                            //off
                            if ($status[$i][0] == 0) {
                                echo('<input value=' . $gpio . ' type="checkbox">');
                            }
                            //on
                            if ($status[$i][0] == 1) {
                                echo('<input value=' . $gpio . ' type="checkbox" checked>');
                            }
                            echo('<span class="lever"></span>' .
                                '</label>' .
                                '</div>' .
                                '</li>'
                            );
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</main>
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container center-align">
            <a class="grey-text text-lighten-4" href="https://github.com/clementRam/gpioControl"><span class="git-hub-icon"></span>Repo GitHub</a>
        </div>
    </div>
</footer>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/materialize/dist/js/materialize.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
