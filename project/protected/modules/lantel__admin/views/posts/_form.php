<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'news-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
        'enctype'=>"multipart/form-data",
    )
)); ?>
	<div class="row">
		<?php if($form->errorSummary($model) != ""){ ?>
			<div class="col-sm-12">
	            <div class="alert alert-danger">
	                <?php echo $form->errorSummary($model); ?>
	            </div>
	        </div>
        <?php } ?>
		<div class="col-sm-6">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Entrada</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->labelEx($model,'title'); ?>
        				<?php echo $form->textField($model,'title',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Título','required'=>true)); ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'post__depende'); ?>
						<?php if(isset($postsCurrent)){ ?>
							<select class="form-control" name="Posts[post__depende]" id="Posts_post__depende">
								<?php if(count($postsCurrent) > 0){ ?>
									<option value="" selected="selected">Seleccione</option>
								<?php }
								else{ ?>
									<option value="" selected="selected">Ninguno</option>
								<?php } ?>
								
								<?php foreach ($postsCurrent as $key => $postCurrent) { ?>
									<option value="<?php echo $postCurrent->id_post; ?>"><?php echo $postCurrent->title; ?></option>
								<?php } ?>
							</select>
						<?php }
						else{ ?>
        					<?php echo $form->dropDownList($model,'post__depende', MyMethods::getListSelect('Posts', 'id_post', 'title'), array('class'=>'form-control')); ?>
						<?php } ?>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'category'); ?>
        				<?php echo $form->dropDownList($model,'category', MyMethods::getListSelect('PostCategories', 'id_category', 'name'), array('class'=>'form-control')); ?>
					</div>
					<div class="form-group">
						<div class="imag-before-upload" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/admin/gray.jpg); max-width: 180px;">
							<?php if(!$model->isNewRecord && $model->image != ""){ ?>
								<div class="img" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/posts/300x300/<?php echo $model->image; ?>)"></div>
							<?php } ?>
						</div>
						<input type="file" accept="image/*" class="btn btn-default js-show-before" name="image" data-before=".imag-before-upload" title="<?php echo ($model->isNewRecord)?'Agregar Imagen':'Cambiar Imagen' ?>">
						<p class="help-block"><strong>Nota: </strong> Peso maximo 200Kb.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Entrada</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->textArea($model,'content',array('class'=>'js-ckeditor')); ?>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Adjuntar Archivo</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<div class="group-inpu">
							<input type="file" class="btn btn-default" name="file" title="Search for a file to add">
							<span class="file-input-name"><?php echo $model->file; ?></span>
							<p class="help-block"><strong>Nota: </strong> Peso maximo 2Mb</p>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('news/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>