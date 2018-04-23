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

$description = 'I New Operations System';
$roles = [
    'admin' => 'Administrator',
    'reporter' => 'Reporter',
    'drummer' => 'Drummer'
];
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
        <div class="sidebar" data-color="azure" data-image="<?= $this->Url->build('/') ?>img/sidebar-6.jpg">

            <!-- 
                Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                Tip 2: you can also add an image using data-image tag 
            -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="https://www.virginmobile.co" target="__blank" class="simple-text">
                        <?= $this->Html->image('logo-virgin.png') ?>
                        <div class="clearfix"></div>
                        <?= __('I New Operations System') ?>
                    </a>
                </div>

                <ul class="nav">
                    <?php if($loggedUser['role'] == 'reporter' || $loggedUser['role'] == 'admin'): ?>
                    <li id="menuSummary">
                        <a href="<?php echo $this->Url->build(["controller" => "Porting", "action" => "index"]);?>">
                            <i class="pe-7s-graph2"></i>
                            <p><?= __('Porting Summary') ?></p>
                        </a>
                    </li>
                    <li id="menuPortIn">
                        <a href="<?php echo $this->Url->build(["controller" => "Porting", "action" => "portin"]);?>">
                            <i class="pe-7s-download"></i>
                            <p><?= __('Port In') ?></p>
                        </a>
                    </li>
                    <li id="menuPortOut">
                        <a href="<?php echo $this->Url->build(["controller" => "Porting", "action" => "portout"]);?>">
                            <i class="pe-7s-upload"></i>
                            <p><?= __('Port Out') ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($loggedUser['role'] == 'drummer' || $loggedUser['role'] == 'admin'): ?>
                    <li id="menuAgents">
                        <a href="<?php echo $this->Url->build(["controller" => "Agents", "action" => "index"]);?>">
                            <i class="pe-7s-id"></i>
                            <p><?= __('Agents') ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($loggedUser['role'] == 'admin' || $loggedUser['role'] == 'admin'): ?>
                    <li id="menuReconciliations">
                        <a href="<?php echo $this->Url->build(["controller" => "Reconciliations", "action" => "index"]);?>">
                            <i class="pe-7s-cash"></i>
                            <p><?= __('Reconcilitations') ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php if($loggedUser['role'] == 'admin'): ?>
                    <li id="menuUsers">
                        <a href="<?php echo $this->Url->build(["controller" => "Users", "action" => "index"]);?>">
                            <i class="pe-7s-user"></i>
                            <p><?= __('Users') ?></p>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href=""><?= $loggedUser['first_name'] . ' ' . $loggedUser['last_name'] . ' (' . $roles[$loggedUser['role']] . ')' ?></a>
                    </div>
                    <div class="collapse navbar-collapse">                    
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg"></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    
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