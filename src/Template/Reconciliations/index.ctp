<script type="text/javascript">
	$('#menuAgents').addClass('active');
</script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title"><?= __('Reconciliations') ?></h4>
				<p class="category"><?= __('Download topup traces for reconciliations') ?></p>
			</div>

			<div class="container-fluid">
				<form method="post" class="row form-horizontal">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group row">
									<label for="msisnd" class="col-md-4 col-form-label"><?= __('MSISDN') ?></label>
									<div class="col-md-8">
										<input id="msisnd" name="msisnd" class="form-control" type="input" placeholder="<?php echo $msisnd ?? 'MSISDN';?>">
										<small id="msisdnHelp" class="form-text text-muted"><?= __('The MSISDN of the topup') ?></small>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group row">
									<label for="datetime" class="col-md-4 col-form-label"><?= __('Datetime') ?></label>
									<div class="col-md-8">
										<input id="datetime" name="datetime" class="form-control" type="datetime">
										<small id="datetimeHelp" class="form-text text-muted"><?= __('The date of the topup') ?></small>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group row">
									<label for="datetime" class="col-md-4 col-form-label"><?= __('Reference') ?></label>
									<div class="col-md-8">
										<input id="transactionID" name="transactionID" class="form-control" type="input" placeholder="<?php echo $transactionID ?? 'Transaction ID';?>">
										<small id="searchHelp" class="form-text text-muted"><?= __('The ID of the transaction') ?></small>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<button type="submit" class="btn btn-info btn-fill pull-right"><?= __('Search') ?></button>
							</div>
						</div>

						<?= $this->Flash->render() ?>
					</div>
				</form>
			</div>

			<div class="content table-responsive table-full-width">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?= __('Filename') ?></th>
							<th><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$('a.releaseAgent').click(function (event) {
		event.preventDefault();

		var url = $(this).attr('href');

		console.log('Clicked URL: ' + url);

		// $("#confirmationMessage").modal('show');

		$.ajax({
			url: url, 
			success: function(result){
				console.log(JSON.stringify(result));
	        	showNotification('top', 'right', 'Agent ' + result.data[0].agentName + ' released', 'success', 'pe-7s-unlock');
	    	},
	    	error: function (result) {
	        	showNotification('top', 'right', 'Agent could\'nt be released', 'danger', 'pe-7s-attention');
	    	}
	    });

	});

	// type = ['','info','success','warning','danger'];
	function showNotification(from, align, message, type, icon){

		$.notify({
			icon: icon,
			message: message
		},{
			type: type,
			timer: 4000,
			placement: {
				from: from,
				align: align
			}
		});
	}
</script>