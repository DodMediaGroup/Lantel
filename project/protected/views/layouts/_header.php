    <?php
    	$facebook = GeneralValue::model()->findByPk(3);
    	$twitter = GeneralValue::model()->findByPk(4);
    ?>

    <header class="header_principal">
    <div class="limiter__container row middle-xs between-sm center-xs">
      <h1 class="col-lg-6 col-md-6 col-sm-12 start-xs"><a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo@x2.png"/></a></h1>
      <h3 class="col-lg-4 col-md-6 col-sm-12">Somos un equipo preparado para prestar el mejor servicio<strong>.</strong></h3>
      <section class="social_icon col-lg-2 col-sm-12"><a href="<?php echo $facebook->value; ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook-icon.svg" class="to-svg"/></a><a href="<?php echo $twitter->value; ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter-icon.svg" class="to-svg"/></a></section>
      <div class="bar-aux"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-white.png"/>
        <div data-menu=".menu" class="menu-bars"><span class="bar"></span><span class="bar"></span><span class="bar"></span></div>
      </div>
    </div>
      <?php $this->renderPartial('//layouts/_menu'); ?>
    </header>