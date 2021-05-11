<h3>История обмена</h3><br>

<table>
	<thead>
		<tr>
			<th class="text-center">дата</th>
			<th class="text-center">время</th>
			<th class="text-center">количество</th>
			<th class="text-center">из</th>
			<th class="text-center">в</th>
			<th class="text-center">получено</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($history as $item) :?> 
			<tr>
				<td class="text-center"><?=date('d.m.Y', $item['date'])?></td>
				<td class="text-center"><?=date('H:i:s', $item['date'])?></td>
				<td class="text-center"><?= $item['quantity']?></td>
				<td class="text-center"><?= $item['currFrom']?></td>
				<td class="text-center"><?= $item['currTo']?></td>
 				<td class="text-right"><?= sprintf("%01.2f", $item['res'])?></td>
			</tr>
		<?php endforeach; ?>		
	</tbody>
</table>