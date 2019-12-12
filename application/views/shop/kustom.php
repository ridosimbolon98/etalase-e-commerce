<div class="custom_dropdown">
	<div class="custom_dropdown_list">
		<span class="custom_dropdown_placeholder clc">Semua Kategori</span>
		<i class="fas fa-chevron-down"></i>
		<ul class="custom_list clc">
				<li><a class="clc" href="<?= base_url(); ?>shop">Semua Kategori</a></li>
			<?php foreach ($kategori as $kat) { ?>
				<li><a class="clc" href="<?= base_url(); ?>shop/kategori/<?= $kat->nama_kategori; ?>"><?= $kat->nama_kategori; ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>