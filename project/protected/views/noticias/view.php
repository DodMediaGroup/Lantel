				<section class="limiter__container row top-xs tel-com">
					<div class="col-xs-12 row tel-com-item">
	          <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/news/<?php echo $new->imagen; ?>) no-repeat center; background-size: cover;" class="col-xs-12 imagen"></div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="col-xs-1 to-svg"/>
	          <h2 class="col-xs-10"><?php echo $new->titulo; ?></h2>
	          <?php echo $new->contenido; ?>
          </div>
          <div class="limiter__container"><a href="<?php echo Yii::app()->homeUrl;?>" class="row end-xs btn-back"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/back-icon.svg" class="col-xs-1 to-svg"/>
          <p class="col-xs-1">VOLVER</p></a></div>
        </section>