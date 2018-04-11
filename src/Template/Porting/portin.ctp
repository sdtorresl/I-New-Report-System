<script type="text/javascript">
	$('#menuPortIn').addClass('active');
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<div class="title-container">
					<h4 class="title"><?= __('Port In Report') ?></h4>
					<?php if (isset($startDate) && isset($endDate)): ?>
					<div>
						<?= $this->Html->link(
							'<i class="pe-7s-print"></i>',
							[
								'controller' => 'porting', 
								'action' => 'portin', 
								'?' => ['startDate' => $startDate, 'endDate' => $endDate, 'pdf' => 1]
							],
							['escape' => false, 'title' => __('Generate PDF')]) ?>
						<?= $this->Html->link(
							'<i class="pe-7s-diskette"></i>',
							[
								'controller' => 'porting', 
								'action' => 'portin', 
								'?' => ['startDate' => $startDate, 'endDate' => $endDate, 'csv' => 1]
							],
							['escape' => false, 'title' => __('Generate CSV')]) ?>
					</div>
					<?php endif; ?>
				</div>
				<p class="category"><?= __('Query port ins between selected dates') ?></p>
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

			<?php if(isset($tickets)): ?>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover table-striped">
					<thead>
						<th><?= __('Old MSISDN') ?></th>
						<th><?= __('New MSISDN') ?></th>
						<th><?= __('Operation') ?></th>
						<th><?= __('Date') ?></th>
						<th><?= __('Carrier') ?></th>
						<th><?= __('Result') ?></th>
					</thead>
					<tbody>
					<?php foreach ($tickets as $key => $ticket): ?>
						<tr>
							<td><?= $ticket->oldmsisdn ?></td>
							<td><?= $ticket->newmsisdn ?></td>
							<?php
							switch ($ticket->operation) {
								case 'PortIn':
									$ticket->operation = __('Port In');
									break;
								case 'PortOut':
									$ticket->operation = __('Port Out');
									break;
								case 'NewImei':
									$ticket->operation = __('New IMEI');
									break;
								case 'VerifyImei':
									$ticket->operation = __('Verify IMEI');
									break;
								default:
									break;
							}
							?>
							<td><?= $ticket->operation ?></td>
							<td><?= $ticket->tickettimestamp ?></td>
							<td><?= $ticket->donorcarrier ? $ticket->donorcarrier : $ticket->recipientcarrier ?></td>
							<td><?= $ticket->resultcode ?></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

				<div class="paginator container-fluid">
					<p class="text-center"><?= $this->Paginator->counter() ?></p>
					<ul class="pagination justify-content-center">
						<?= $this->Paginator->prev('< ') ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(' >') ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>

<?php if (isset($tickets)): ?>
<script type="text/javascript">
	$(document).ready(function(){
		$.notify({
			icon: 'pe-7s-graph',
			message: "Your <b>Port In Report</b> is ready"

		},{
			type: 'info',
			timer: 4000
		});
	});
</script>
<?php endif; ?>
