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
<html lang="es">
    <head>
        <?= $this->Html->charset() ?>
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="http://10.208.80.167/reports/img/logo-virgin.png" alt="">
            </div>
            <div class="date"><?= date("Y/m/d"); ?></div>
        </header>
        
        <section class="main"> 
           <?= $this->fetch('content') ?>
        </section>
           
        <footer>
            <?= __('Reporte generado por I New') ?>
        </footer>
    </body>
</html>

<style type="text/css">
    * {
        font-size: 16px;
    }
    header .logo {
        float: left;
        padding-bottom: 30px;
    }
    .logo img {
        width: 120px
    }
    header .date {
        float: right;
    }
    .main {
        clear: both;
    }
    .title {
        font-weight: bold;
        font-size: 20px;
        margin-top: 30px;
        margin-bottom: 30px;
        text-align: center;
        text-transform: uppercase;
    }
    .description {
        margin-top: 10px;
        margin-bottom: 30px;
    }
    table  {
        width: 100%;
        margin-bottom: 40px;
    }
    td {
        padding: 5px 10px;
        text-align: center;
        font-size: 14px;
    }
    thead td {
        padding: 5px 5px 10px 5px;
        border-bottom: 1px solid #ccc;
        text-transform: uppercase;
    }
    .even {
        background: #CECEFF;
    }
    footer, .date {
        margin-top: 50px;
        text-align: right;
    }
    /*Avoid overlap whe span pages*/
    thead { display: table-header-group }
    tfoot { display: table-row-group }
    tr { page-break-inside: avoid }
</style>