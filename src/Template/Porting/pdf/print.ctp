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
		
		<?php foreach ($printable as $row): ?>
		<tr>
			<?php foreach ($row as $value): ?>
			<td><?= $value ?></td>
			<?php endforeach; ?>	
		</tr>		
		<?php endforeach; ?>
	</table>
</div>