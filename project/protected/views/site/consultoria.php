      <section class="background-image">
        <article>
          <div class="image-background"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/Banner_consultoria.png"/></div>
        </article>
      </section>
      <section class="limiter__container row top-xs consultancy">
        <?php foreach ($posts as $key => $post) { ?>
          <div class="col-md-4 col-sm-6 col-xs-12 row center-xs consultancy-item">
            <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/posts/<?php echo $post->image; ?>) no-repeat center; background-size: cover;" class="col-xs-12 imagen"></div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="col-xs-1 to-svg"/>
            <h2 class="col-xs-10"><?php echo $post->title; ?></h2>
            <?php echo $post->content; ?>
          </div>
        <?php } ?>
      </section>