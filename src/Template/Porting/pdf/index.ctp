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
			<?php foreach ($summary as $key => $value): ?>
			<tr class="<?= ($key % 2) == 0 ? 'even' : 'odd' ?>">
				<td><?= $value->operation ?></td>
				<td><?= $value->count ?></td>
			</tr>		
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="description">
	<?= $options['description1'] ?>
</div>

<div class="report">
	<table>
		<thead>
			<tr>
				<?php foreach ($options['headers1'] as $key => $value): ?>
				<td><?= $value ?></td>	
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($summaryByDonorCarrier as $key => $value): ?>
			<tr class="<?= ($key % 2) == 0 ? 'even' : 'odd' ?>">
				<td><?= $value->donorcarrier ?></td>
				<td><?= $value->count ?></td>
			</tr>		
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="description">
	<?= $options['description2'] ?>
</div>

<div class="report">
	<table>
		<thead>
			<tr>
				<?php foreach ($options['headers1'] as $key => $value): ?>
				<td><?= $value ?></td>	
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($summaryByRecipientCarrier as $key => $value): ?>
			<tr class="<?= ($key % 2) == 0 ? 'even' : 'odd' ?>">
				<td><?= $value->recipientcarrier ?></td>
				<td><?= $value->count ?></td>
			</tr>		
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<div class="description">
	<?= $options['description3'] ?>
</div>

<div class="report">
	<table>
		<thead>
			<tr>
				<?php foreach ($options['headers2'] as $key => $value): ?>
				<td><?= $value ?></td>	
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tickets as $key => $value): ?>
			<tr class="<?= ($key % 2) == 0 ? 'even' : 'odd' ?>">
				<td><?= $value->date ?></td>
				<td><?= $value->portin ?></td>
				<td><?= $value->portout ?></td>
				<td><?= $value->portin + $value->portout ?></td>
			</tr>		
			<?php endforeach; ?>
		</tbody>
	</table>
</div>