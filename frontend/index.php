<?php

$files = array_diff(scandir(__DIR__),['..','.']);
?>

<ul>
	<?php foreach($files as $file): ?>
		<?php if(!is_dir($file) && pathinfo($file,PATHINFO_EXTENSION) == 'html'): ?>
			<li>
				<a href="<?=$file?>"> <?=$file?> </a>
			</li>
		<?php endif; ?>
	<?php endforeach;?>
</ul>


