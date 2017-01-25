      <nav id="principal-menu">
        <ul class="row middle-xs center-xs limiter__container">
          <li class="logo-fixed"><a href="<?php echo Yii::app()->homeUrl; ?>"><img class="logo-img" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo-white.png"/>
              <div data-menu=".menu" class="menu-bars"><span class="bar"></span><span class="bar"></span><span class="bar"></span></div></a></li>
          <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/nosotros'); ?>">
              <p class="text-item">NOSOTROS</p></a></li>
          <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/consultoria'); ?>">
              <p class="text-item">CONSULTORÍA</p></a></li>
          <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/telecomunicaciones'); ?>">
              <p class="text-item">TELECOMUNICACIONES</p></a></li>
          <!--<li class="item col-xs row middle-xs center-xs"><a href="<?php //echo $this->createUrl('/ventaCapacidad'); ?>">
              <p class="text-item">VENTA DE CAPACIDAD Y COBERTURA</p></a></li>-->
          <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/suministros'); ?>">
              <p class="text-item">SUMINISTROS</p></a></li>
          <!-- <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/energia'); ?>">
              <p class="text-item">ENERGÍA</p></a></li> -->
          <li class="item col-xs row middle-xs center-xs"><a href="<?php echo $this->createUrl('/contacto'); ?>">
              <p class="text-item">CONTACTO</p></a></li> 
          <li class="social-icon-fixed-fb"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook-icon.svg"/></a></li>
          <li class="social-icon-fixed-tw"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter-icon.svg"/></a></li>
        </ul>
      </nav>