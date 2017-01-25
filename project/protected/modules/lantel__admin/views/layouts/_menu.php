<?php $path = explode("/",Yii::app()->request->pathInfo); ?>
<li>
	<a href='<?php echo $this->createUrl('index/') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'index')?'active':''):'active'; ?>">
		<i class='icon-home-3'></i>
		<span>Dashboard</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('news/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'news')?'active':''):''; ?>">
		<i class='icon-layout'></i>
		<span>Noticias</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('posts/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'posts')?'active':''):''; ?>">
		<i class='icon-layout'></i>
		<span>Posts</span>
	</a>
</li>

<li class='has_sub'>
	<a href='#'>
		<i class='icon-picture-2'></i>
		<span>Multimedia</span>
		<span class="pull-right">
			<i class="fa fa-angle-down"></i>
		</span>
	</a>
	<ul>
		<li>
			<a href='<?php echo $this->createUrl('imagesbank/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'imagesbank')?'active':''):''; ?>">
				<span>Banco de Imagenes</span>
			</a>
		</li>
	</ul>
</li>