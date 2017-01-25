      <section class="background-image">
        <article>
          <div class="image-background"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/banner/Banner_suministros.png"/></div>
        </article>
      </section>
      <section class="limiter__container row top-xs suministros">
        <?php
        $colors = ['purple','yellow'];
        foreach ($posts as $key => $post) {
          if($post->post__depende == ''){
            $color = $colors[$key%2];
            $postsInside = Posts::model()->findAllByAttributes(array('status'=>1,'post__depende'=>$post->id_post));
          ?>
            <div class="col-md-6 col-sm-6 col-xs-12 row <?php echo $color; ?>-item">
              <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/posts/<?php echo $post->image; ?>) no-repeat center; background-size: cover;" class="col-xs-12 imagen"></div>
              <h2 class="col-xs-12"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="to-svg"/><span><?php echo $post->title; ?></span></h2>

              <?php foreach ($postsInside as $key => $postInside) { ?>
                <a href="<?php echo $this->createUrl('/suministros/'.$postInside->post__url); ?>" class="row between-xs around-xs middle-xs rectangle-<?php echo $color; ?>">
                  <p class="start-xs col-xs-10"><?php echo $postInside->title; ?></p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/plus-icon.svg" class="end-xs to-svg"/>
                </a>
              <?php } ?>
            </div>
          <?php }
        } ?>
      </section>