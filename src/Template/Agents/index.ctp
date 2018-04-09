<script type="text/javascript">
	$('#menuAgents').addClass('active');
</script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title"><?= __('Agents') ?></h4>
				<p class="category"><?= __('List of agents') ?></p>
			</div>

			<div class="container-fluid">
				<form method="post" class="row form-horizontal">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group row">
									<label for="search" class="col-md-4 col-form-label"><?= __('ID or Agent Name') ?></label>
									<div class="col-md-8">
										<input id="search" name="search" class="form-control" type="input" placeholder="<?php echo $search ?? 'ID or Agent Name';?>">
										<small id="searchHelp" class="form-text text-muted"><?= __('The name or ID of the agent') ?></small>
									</div>
								</div>
							</div>

							<div class="col-md-2">
								<button type="submit" class="btn btn-info btn-fill pull-right"><?= __('Search') ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>

			<div class="content table-responsive table-full-width">
				<table class="table table-hover">
					<thead>
						<tr>
							<th><?= $this->Paginator->sort('ID') ?></th>
							<th><?= $this->Paginator->sort('Agent Name') ?></th>
							<th><?= $this->Paginator->sort('State') ?></th>
							<!-- <th><?= $this->Paginator->sort('Duration') ?></th> -->
							<th class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($agents as $agent): ?>
						<tr>
							<td><?= h($agent->userId) ?></td>
							<td><?= ucwords(mb_strtolower($agent->agentName)) ?></td>
							<td><?= str_replace('_', ' ', $agent->agentState) ?></td>
							<!-- <td><?= h($agent->stampMsec) ?></td> -->
							<td class="actions">
								<?= $this->Html->link(
									__('Unstuck'), 
									['action' => 'unstock', $agent->userId],
									['class' => 'releaseAgent']) ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<div class="paginator container-fluid">
					<p class="text-center"><?= $this->Paginator->counter() ?></p>
					<ul class="pagination justify-content-center">
						<?= $this->Paginator->prev('<') ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next('>') ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmationMessage">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel"><?= __('Are you sure you want to unstock agent?') ?></h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="modal-btn-si"><?= __('Yes') ?></button>
				<button type="button" class="btn btn-primary" id="modal-btn-no"><?= __('No') ?></button>
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

	// var modalConfirm = function(callback){
  
	// 	$("#btn-confirm").on("click", function(){
	// 		$("#confirmationMessage").modal('show');
	// 	});

	// 	$("#modal-btn-si").on("click", function(){
	// 		callback(true);
	// 		$("#confirmationMessage").modal('hide');
	// 	});

	// 	$("#modal-btn-no").on("click", function(){
	// 		callback(false);
	// 		$("#confirmationMessage").modal('hide');
	// 	});
	// };

	// modalConfirm(function(confirm){
	// 	if(confirm){
	// 		$("#result").html("CONFIRMADO");
	// 	}else{
	// 		$("#result").html("NO CONFIRMADO");
	// 	}
	// });
</script>