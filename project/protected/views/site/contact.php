		<section class="limiter__container row top-xs">
			<div class="col-md-4 col-sm-12 row sumin-article top-xs center-xs">
        <h2 class="col-xs-12"><img src="images/plus-icon.svg" class="col-xs-1 to-svg"/>CONTÁCTANOS</h2>
        <p>Tus comentarios son muy valiosos. Escríbenos y pronto nos comunicaremos contigo.</p>
      </div>
      <form class="form-contact form__ajax row middle-xs center-xs col-md-8" action="<?php echo $this->createUrl('/contact'); ?>" method="POST">
        <div class="col-sm-6 col-xs-12 start-xs item-contact">
          <label>Nombre</label><br/>
          <input type="text" name="name" required autocomplete="off" />
        </div>
        <div class="col-sm-6 col-xs-12 start-xs item-contact">
          <label>Ciudad</label><br/>
          <input type="text" name="city" autocomplete="off" />
        </div>
        <div class="col-sm-6 col-xs-12 start-xs item-contact">
          <label>Correo</label><br/>
          <input type="email" name="email" required autocomplete="off" />
        </div>
        <div class="col-sm-6 col-xs-12 start-xs item-contact">
          <label>Teléfono</label><br/>
          <input type="phone" name="phone" autocomplete="off" />
        </div>
        <div class="col-xs-12 start-xs item-contact">
          <label>Comentario</label><br/>
          <textarea type="text" name="message" required></textarea>
        </div>
        <button type="submit" value="send" class="end-xs">Enviar</button>
      </form>
    </section>