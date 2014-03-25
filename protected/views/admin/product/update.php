<?php
    /* @var $this ProductController */
    /* @var $model Product */

    $this->breadcrumbs = array(
        'Products'   => array('index'),
        $model->name => array('view', 'id' => $model->id),
        'Update',
    );

    $this->menu = array(
        array('label' => 'Thêm mới', 'url' => array('create')),
        array('label' => 'Upload ảnh', 'url' => array('batchUpload')),
        array('label' => 'Danh sách', 'url' => array('admin')),
    );
?>

<h4>Sửa sản phẩm: <?php echo $model->name; ?></h4>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>