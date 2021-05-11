<form method="POST">
	<table>
		<thead>
			<tr>
				<th class="text-form">количество</th>
				<th class="text-form">меняем</th>
				<th class="text-form">на</th>
				<th class="text-form">
					<button name="submit" type="submit" class="text-form itemcolor">Вычисляем</button>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<input class="text-form" name="quantity" type="number" value="<?=$quantity?>">
				</td>
				<td>
					<select class="text-form" name="from">
						<?foreach ($this->settingsCurrency as $pos) {
						    	echo"<option value = '".$pos['ccy']."'>".$pos['ccy']."</option>";
						    }
						    ?>
					</select>
				</td>
				<td>
					<select class="text-form" name="to">
						<?foreach ($this->settingsCurrency as $pos) {
						    	echo"<option value = '".$pos['ccy']."'>".$pos['ccy']."</option>";
						    }
						    ?>
					</select>
				</td>
				<td class="text-form"><?=sprintf("%01.2f", $result)?></td>
			</tr>
		</tbody>
	</table>
</form>