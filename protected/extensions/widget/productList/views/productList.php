<div class="box_wrapper_title22">
    <div class="box_wrapper_title"><span class="title-icon"></span>

        <h1 class="cl_both "><span class="color"><?php echo $title; ?></span></h1>
    </div>
</div>

<div class="contentContainer first">
    <div class="contentPadd sub">
        <div class="prods_content">
            <ul id="sub_categories" class="row_sub_categories first last">
                <?php foreach ($items as $item) {
                    ?>
                    <li class="wrapper_prods hover last" style="width:218px;">
                        <div class="product-image">
                            <a class="prods_pic_bg"
                                   onclick="window.location.href='<?php echo Yii::app()->createUrl('/site/detail', array('id' => $item['id'])) ?>';return false;">
                                    <img src="<?php echo Yii::app()->request->baseUrl . $item['avatar'] ?>"
                                         alt="<?php echo Yii::app()->request->baseUrl . $item['name'] ?>"
                                         title="<?php echo Yii::app()->request->baseUrl . $item['name'] ?>" width="92"
                                         height="92"
                                         style="width:218px;height:218px;margin:0px 0px 0px 0px;">
                                </a>
                        </div>
                        <div class="product-detail">
                            <div class="name name_padd equal-height_sub_categories_name" style="min-height: 32px;">
                                    <div>
                                        <p>
                                            <a href="<?php echo Yii::app()->createUrl('/site/detail', array('id' => $item['id'])) ?>" title="<?php CHtml::encode($item['name']);?>">
                                                <span style="font-size: 14px;">
                                                    <?php echo CHtml::encode(StringHelper::helper()->cutText($item['name'], 56));?>
                                                </span>
                                            </a>
                                        </p>
                                        <p style="margin-top: 10px;">
                                            <a href="<?php echo Yii::app()->createUrl('/site/detail', array('id' => $item['id'])) ?>">
                                                <span style="color: #BF0000;font-size: 14px;">
                                                <?php echo number_format($item['price'],0,",","."); ?> đ
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </li>
                <?php
                }
            ?>
            </ul>
        </div>
    </div>
</div>