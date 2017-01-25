			<section>
        <div id="particles-js" class="slider">
          <ul>
            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_principal.jpg" style="width: 100%;max-height: 580px;"/></li>
            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_principal-2.jpg" style="width: 100%;max-height: 580px;"/></li>
            <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/banner_principal-3.jpg" style="width: 100%;max-height: 580px;"/></li>
          </ul></div>
      </section>
      <section class="limiter__container row middle-xs">
        <div class="title_notice row middle-xs">
          <h2 class="col-xs-12"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="to-svg"/><span>NOTICIAS</span></h2>
        </div>
        <div class="row middle-xs center-xs between-xs content-news">
        	<?php foreach ($news as $key => $new) { ?>
	          <div class="col-md-4 col-sm-6 col-xs-12 items-news center-xs">
	            <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/news/<?php echo $new->imagen; ?>) no-repeat center; background-size: cover;" class="col-xs image-item"></div>
	            <div class="line-item"></div>
	            <div class="title-item"><?php echo $new->titulo; ?></div>
	            <p class="text-item"><?php echo substr(strip_tags($new->contenido), 0, 150) ?></p>
	            <a href="<?php echo $this->createUrl('/noticias/'.$new->id.'_'.MyMethods::normalizarUrl($new->titulo)); ?>" class="view-plus row end-xs"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="col-xs-1 to-svg"/>
	              <p>ver más</p>
              </a>
	          </div>
        	<?php } ?>
        </div>
      </section>