<form>
	<legend>Настройки</legend>
	<?php foreach ($arrTemp as $item) :?>
		<?php if ($item["item"] == "quantity") :?>
		<label>кол<br> записей</label>
		<input name="quantity" type="number"  value="<?=$item['value']?>"><br><br>
	<?php endif; ?>
	<?php endforeach; ?>

	<?php foreach ($arrTemp as $item) :?>
		<?php if ($item["item"] != "quantity") :?>
		<label><?=$item['item']?></label>
		<input name="<?=$item['item']?>" type="checkbox" value="<?=$item['value']?>" 
			
			<? echo (($item['value']) ? "checked" : "")?>
		><br>
		<?php endif; ?>
	<?php endforeach; ?><br>
	<div class=""><button name="submit" type="submit" formmethod="post" class="">Сохранить</button></div>
</form>
