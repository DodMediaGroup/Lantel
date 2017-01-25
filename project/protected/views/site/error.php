<!DOCTYPE html>
<html>
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
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fractionslider/fractionslider.css" rel="stylesheet"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet"/>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery.min.js"></script>
  </head>
  <body>
    <section class="error">
      <div class="content-error"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img-error.svg"></div>
      <div class="text-error row center-xs middle-xs"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo@x2.png" class="logo-error">
        <h3>Somos un equipo preparado para prestar el mejor servicio<span>.</span></h3>
        <div class="col-xs-12">
          <h2>error</h2>
        </div>
      </div>
      <footer class="limiter__container">
        <div class="content-footer row center-xs middle-xs around-xs">
          <div class="col-md-6 col-sm-6 col-xs-12 item-footer row"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/leaf.svg"><span>Comprometidos</span>
            <h3>Con El Ambiente</h3>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12 item-footer">
            <p>Télefono: 1765 23 45</p>
            <p>Calle 96 No. 13. 08 Oficina 302</p>
            <p>Bogotá D.C. , Colombia</p>
            <p class="text-small-footer">Marca Registrada Lantel, 2016</p>
          </div>
        </div>
      </footer>
    </section>
  </body>
</html>