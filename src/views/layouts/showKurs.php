<h5 class="text-rate">курсы валют Приватбанка</h5>
<table class="text-rate">
	<thead>
		<tr>
			<th>валюта</th>
			<th>покупка</th>
			<th>продажа</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->listСurrency as $item) :?> 
			<?php if ($item['ccy'] != "UAH"):?>
			<tr>
				<td><?= $item['ccy']?></td>
				<td><?= sprintf("%01.2f", $item['buy'])?></td>
				<td><?= sprintf("%01.2f", $item['sale'])?></td>
			</tr>
		<?php endif; ?>
		<?php endforeach; ?>		
	</tbody>
</table><br><br>