<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Respuestas','url'=>array('index')),
	array('label'=>'Manage Respuestas','url'=>array('admin')),
);*/
?>

<h1 class="h1_titulos">Creaci&oacute;n de una respuestas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>