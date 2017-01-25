      <section class="limiter__container row top-xs center-xs">
      	<div class="contenido-admin">
        	<?php echo $post->content; ?>
      	</div>
      </section>
      <div class="limiter__container"><a href="<?php echo $this->createUrl('/suministros'); ?>" class="row end-xs btn-back"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/back-icon.svg" class="col-xs-1 to-svg"/>
          <p class="col-xs-1">VOLVER</p></a></div>