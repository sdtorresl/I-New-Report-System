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
		<tbody>
			<?php foreach ($tickets as $key => $ticket): ?>
			<tr class="<?= ($key % 2) == 0 ? 'even' : 'odd' ?>">
				<td><?= $ticket->oldmsisdn ?></td>
				<td><?= $ticket->newmsisdn ?></td>
				<td><?= $ticket->tickettimestamp ?></td>
				<td><?= $ticket->donorcarrier ? $ticket->donorcarrier : $ticket->recipientcarrier ?></td>
				<td><?= $ticket->resultcode ?></td>
			</tr>		
			<?php endforeach; ?>
		</tbody>
	</table>
</div>