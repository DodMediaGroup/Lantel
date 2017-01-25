      <section class="background-image">
        <article>
          <div class="image-background"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/Banner_telecomunicaciones.png"/></div>
        </article>
      </section>
      <section class="limiter__container row top-xs tel-com">
        <?php foreach ($posts as $key => $post) {
          if($post->post__depende == ''){ ?>
            <a href="<?php echo $this->createUrl('/telecomunicaciones/'.$post->post__url); ?>" class="col-md-6 col-sm-6 col-xs-12 row tel-com-item">
              <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/posts/<?php echo $post->image; ?>) no-repeat center; background-size: cover;" class="col-xs-12 imagen"></div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="col-xs-1 to-svg"/>
              <h2 class="col-xs-10"><?php echo $post->title; ?></h2>
              <?php echo $post->content; ?>
            </a>
          <?php }?>
        <?php } ?>
      </section>