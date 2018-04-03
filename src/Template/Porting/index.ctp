<script type="text/javascript">
    $('#menuSummary').addClass('active');
</script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title"><?= __('Porting Summary Report') ?></h4>
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
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php if (isset($summary) && isset($summaryByDonorCarrier) && isset($summaryByRecipientCarrier)): ?>
<div class="row">
	<div class="col-md-6">
        <div class="card">

            <div class="header">
                <h4 class="title">Summary</h4>
                <p class="category">Summary of portings</p>
            </div>
            <div class="content">
                <div id="chartSummary" class="ct-chart ct-perfect-fourth"></div>

                <div class="footer">
                    <!-- <div class="legend">
                        <i class="fa fa-circle text-info"></i> Open
                        <i class="fa fa-circle text-danger"></i> Bounce
                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                    </div> -->
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
                <h4 class="title">Port Out</h4>
                <p class="category">Summary of port out</p>
            </div>
            <div class="content">
                <div id="chartSummaryByDonorCarrier" class="ct-chart ct-perfect-fourth"></div>

                <div class="footer">
                    <!-- <div class="legend">
                        <i class="fa fa-circle text-info"></i> Open
                        <i class="fa fa-circle text-danger"></i> Bounce
                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                    </div> -->
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
                <h4 class="title">Port In</h4>
                <p class="category">Summary of port in</p>
            </div>
            <div class="content">
                <div id="chartSummaryByRecipientCarrier" class="ct-chart ct-perfect-fourth"></div>

                <div class="footer">
                    <!-- <div class="legend">
                        <i class="fa fa-circle text-info"></i> Open
                        <i class="fa fa-circle text-danger"></i> Bounce
                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                    </div> -->
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

<script type="text/javascript">
    $(document).ready(function(){

    	<?php if (isset($summary)): ?>
    	var summary = <?php echo json_encode($summary); ?>;
    	var summaryByDonorCarrier = <?php echo json_encode($summaryByDonorCarrier); ?>;
    	var summaryByRecipientCarrier = <?php echo json_encode($summaryByRecipientCarrier); ?>;
    	console.log(summary);

        porting.initChartist(summary, summaryByDonorCarrier, summaryByRecipientCarrier);

        $.notify({
            icon: 'pe-7s-graph',
            message: "Your <b>Porting Summary Report</b> is ready"

        },{
            type: 'info',
            timer: 4000
        });

        <?php endif; ?>

    });
</script>