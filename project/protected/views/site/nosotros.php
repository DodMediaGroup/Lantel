      <section class="background-image">
        <article>
          <div class="image-background"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/Banner_nosotros.png"/></div>
        </article>
      </section>
      <section class="row top-xs around-xs about-section">
        <?php foreach ($posts as $key => $post) { ?>
          <div class="col-md-4 col-sm-6 col-xs-12 row about-item">
            <h2 class="col-xs-12"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="to-svg"/><span><?php echo $post->title; ?></span></h2>
            <?php echo $post->content; ?>
          </div>
        <?php } ?>

        <div class="row start-xs team">
          <div class="row col-md-4 col-sm-6 col-xs-12"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="col-xs-1 to-svg"/>
            <h2 class="col-xs-8">NUESTRO EQUIPO</h2>
            <div class="col-xs-11 rectangle middle-xs">
              <h3>Somos un equipo preparado para brindar el mejor servicio.</h3>
            </div>
          </div>
          <?php foreach ($personas as $key => $persona) { ?>
            <div class="col-md-4 col-sm-6 col-xs-12 item-team row center-xs">
              <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/posts/<?php echo $persona->image; ?>) no-repeat center; background-size: cover;" class="member-team col-xs-12"> </div>
              <h4 class="col-xs-12"><?php echo $persona->title; ?></h4>
              <h5><?php echo strip_tags($persona->content); ?></h5>
            </div>
          <?php } ?>
        </div>
      </section>