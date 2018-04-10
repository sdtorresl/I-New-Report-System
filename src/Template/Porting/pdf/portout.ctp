<div class="title">
	<?= $options['title'] ?>
</div>

<div class="description">
	<?= $options['description'] ?>
</div>

<div class="report">

	<table>
		<thead>
			<tr>
				<?php foreach ($options['headers'] as $key => $value): ?>
				<td><?= $value ?></td>	
				<?php endforeach; ?>
			</tr>
		</thead>
		
		<?php foreach ($tickets as $key => $ticket): ?>
		<tr>
			<td><?= $ticket->oldmsisdn ?></td>
			<td><?= $ticket->newmsisdn ?></td>
			<td><?= $ticket->tickettimestamp ?></td>
			<td><?= $ticket->donorcarrier ? $ticket->donorcarrier : $ticket->recipientcarrier ?></td>
			<td><?= $ticket->resultcode ?></td>
		</tr>		
		<?php endforeach; ?>
	</table>
</div>

<style type="text/css">
	* {
		/*font-size: 15pt;*/
	}
	.title {
		font-weight: bold;
		font-size: 20px;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.description {
		margin-top: 10px;
		margin-bottom: 10px;
	}
	table {
		margin-top: 20px;
	}
	thead {
		margin-bottom: 15px;
	}

	td {
		padding: 10px;
	}

</style>