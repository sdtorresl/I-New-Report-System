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