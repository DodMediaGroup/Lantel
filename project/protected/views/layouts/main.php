<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>

    <meta name="application-name" content="Lantel" />
    <meta name="description" content="<?php echo CHtml::encode($this->pageDescription); ?>" />
    <meta name="keywords" content="Lantel, Soluciones tecnologicas, Suministros, Consultoria." />
    <meta name="robots" content="index, follow" />

    <meta name="author" content="Lantel" />

    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>">
    <meta property="og:image" content="<?php echo Yii::app()->createAbsoluteUrl($this->tagImage); ?>">
    <meta property="og:description" content="<?php echo CHtml::encode($this->pageDescription); ?>">
      
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/favicon.ico" type="image/x-icon"/>

    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/normalize.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/flexboxgrid.min.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet"/>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery.min.js"></script>
  </head>
  <body class="row center-xs">
	<?php $this->renderPartial('//layouts/_header'); ?>

	<section class="content">
		<?php echo $content; ?>
	</section>

	<?php $this->renderPartial('//layouts/_footer'); ?>

    <div class="modal__loading"></div>
    <div class="message__popup">
      <div class="row middle-xs">
        <div class="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png"/></div>
        <div class="message__content">
          <h3 class="message__title">Notificación Sistema</h3>
          <p class="message__text">Se envio correctamente tu mensaje.</p>
        </div>
      </div>
    </div>

  	
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
  </body>
</html>