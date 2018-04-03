<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$description = 'I New Report System';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>
        <?= $description ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">

    <!-- Bootstrap core CSS     -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- Animation library for notifications   -->
    <?= $this->Html->css('animate.min.css') ?>
    <!--  Light Bootstrap Table core CSS    -->
    <?= $this->Html->css('light-bootstrap-dashboard.css?v=1.4.0') ?>
    <!-- Icons -->
    <?= $this->Html->css('pe-icon-7-stroke.css') ?>
    <!-- Custom CSS -->
    <?= $this->Html->css('report.css') ?>

    <!--   Core JS Files   -->
    <?= $this->Html->script('jquery.3.2.1.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <!--  Charts Plugin -->
    <?= $this->Html->script('chartist.min.js') ?>

    <!--  Notifications Plugin    -->
    <?= $this->Html->script('bootstrap-notify.js') ?>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <?= $this->Html->script('light-bootstrap-dashboard.js?v=1.4.0') ?>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>

<div class="wrapper">
    
    <div id="login" class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="mailto:support.colombia@i-new.com">Support</a>
                        </li>
                        <li>
                            <a href="mailto:sergio.torres@i-new.com">Developed by: Sergio Torres</a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.i-new.com/" target="__blank">I New Colombia</a>, Enabling digital transformation over next generation platform solutions
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
</html>
