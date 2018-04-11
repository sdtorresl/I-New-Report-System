<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js') ?>

<script type="text/javascript">
    $('#menuSummary').addClass('active');
</script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
                <div class="title-container">
				    <h4 class="title"><?= __('Porting Summary Report') ?></h4>
                    <?php if (isset($startDate) && isset($endDate)): ?>
                    <div>
                        <?= $this->Html->link(
                            '<i class="pe-7s-print"></i>',
                            [
                                'controller' => 'porting', 
                                'action' => 'index', 
                                '?' => ['startDate' => $startDate, 'endDate' => $endDate, 'pdf' => 1]
                            ],
                            ['escape' => false, 'title' => __('Generate PDF')]) ?>
                        <?= $this->Html->link(
                            '<i class="pe-7s-diskette"></i>',
                            [
                                'controller' => 'porting', 
                                'action' => 'index', 
                                '?' => ['startDate' => $startDate, 'endDate' => $endDate, 'csv' => 1]
                            ],
                            ['escape' => false, 'title' => __('Generate CSV')]) ?>
                    </div>
                    <?php endif; ?>
                </div>
				<p class="category"><?= __('Query summary of portings between selected dates') ?></p>
			</div>
			
			<div class="container-fluid">
                
                <form method="get" class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="startDate" class="col-md-4 col-form-label"><?= __('Start Date') ?></label>
                                    <div class="col-md-6">
                                        <input id="startDate" name="startDate" class="form-control" type="date" value="<?php echo $startDate ?? '';?>">
                                        <small id="startDateHelp" class="form-text text-muted"><?= __('Select the start date of the report') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label for="endDate" class="col-md-4 col-form-label"><?= __('End Date') ?></label>
                                    <div class="col-md-6">
                                        <input id="endDate" name="endDate" class="form-control" type="date" value="<?php echo $endDate ?? '';?>">
                                        <small id="endDateHelp" class="form-text text-muted"><?= __('Select the end date of the report') ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-info btn-fill pull-right"><?= __('Query') ?></button>
                            </div>
                        </div>

                        <?= $this->Flash->render() ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php if (isset($summary) && isset($summaryByDonorCarrier) && isset($summaryByRecipientCarrier) && isset($tickets)): ?>
<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Summary') ?></h4>
                <div class="category"><?= __('Summary of portings') ?></div>
            </div>
            <div class="content">
                <canvas id="chartSummary"></canvas>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> <?= __('From ') . $startDate . __(' to ') . $endDate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Port In') ?></h4>
                <p class="category"><?= __('Summary of port in') ?></p>
            </div>
            <div class="content">
                <canvas id="chartPortin" width="300" height="300"></canvas>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> <?= __('From ') . $startDate . __(' to ') . $endDate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Port Out') ?></h4>
                <p class="category"><?= __('Summary of port out') ?></p>
            </div>
            <div class="content">
                <canvas id="chartPortout" width="300" height="300"></canvas>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> <?= __('From ') . $startDate . __(' to ') . $endDate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title"><?= __('Portings') ?></h4>
                <p class="category"><?= __('Summary of portings by date') ?></p>
            </div>
            <div class="content">
                <canvas id="chartPortings"></canvas>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> <?= __('From ') . $startDate . __(' to ') . $endDate ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php endif; ?>

<?= $this->Html->script('porting.js') ?>

<?php if (isset($summary) && isset($summaryByDonorCarrier) && isset($summaryByRecipientCarrier) && isset($tickets)): ?>
<script type="text/javascript">
    $(document).ready(function(){

    	var summary = <?php echo json_encode($summary); ?>;
    	var portin = <?php echo json_encode($summaryByDonorCarrier); ?>;
        var portout = <?php echo json_encode($summaryByRecipientCarrier); ?>;
        var tickets = <?php echo json_encode($tickets); ?>;

        porting.loadSummaryChart(summary);
        porting.loadPortOutChart(portout);
        porting.loadPortInChart(portin);
        porting.loadPortIngsByDateChart(tickets);

        $.notify({
            icon: 'pe-7s-graph',
            message: "Your <b>Porting Summary Report</b> is ready"

        },{
            type: 'info',
            timer: 4000
        });
    });
</script>
<?php endif; ?>