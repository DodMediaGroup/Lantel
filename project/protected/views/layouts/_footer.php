    <footer class="limiter__container">
      <?php if($this->showSectionContact){
       
      ?>
        <form class="form-footer form__ajax row middle-xs center-xs" action="<?php echo $this->createUrl('/contact'); ?>" method="POST">
          <div class="col-md-4 col-sm-6 col-xs-12 start-xs">
            <label>Nombre</label><br/>
            <input type="text" name="name" required autocomplete="off" />
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 start-xs">
            <label>Correo</label><br/>
            <input type="email" name="email" required autocomplete="off" />
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 start-xs">
            <label>Comentario</label><br/>
            <textarea type="text" name="message" required></textarea>
          </div>
          <button type="submit" class="end-xs">Enviar</button>
        </form>
      <?php } ?>
      <div class="content-footer row center-xs middle-xs around-xs">
        <div class="col-md-4 col-sm-6 col-xs-12 item-footer row"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/leaf.svg"/><span>Comprometidos</span>
          <h3>Con El Ambiente</h3>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 item-footer">
          <?php  $contact = GeneralValue::model()->findByPk(2); ?>
          <p>Télefono: <?php echo $contact->value ?></p>
          <p>Carrera 9 b No. 117 a 41</p>
          <p>Bogotá D.C. , Colombia</p>
          <p class="text-small-footer">Marca Registrada Lantel, 2016</p>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 item-footer"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png"/></div>
      </div>
    </footer>