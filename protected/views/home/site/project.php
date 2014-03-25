<section id="content">
    <div class="container_24">
        <div class="wrapper m_bot4">
            <article class="grid_6">
                <h2>Đối tác <span>trong nước</span></h2>
                <ul class="list1 list_ind">
                    <?php
                    foreach ($owner as $key => $value) {
                        if ($key == 9) {
                            $class = 'last';
                        } else {
                            $class = '';
                        }
                        ?>
                        <li class="<?php echo $class ?>"><a href="<?php if($value['address']) {echo $value['address'];} else {echo "";}?>"><?php echo $value['name']?></a></li>
                    <?php } ?>
                </ul>
            </article>
            <article class="grid_8 prefix_2 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/Feldspar.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2480.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
            <article class="grid_8 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2482.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2483.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
        </div>
        <div class="wrapper m_bot4">
            <article class="grid_6">
                <h2>Đối tác <span>nước ngoài</span></h2>
                <ul class="list1 list_ind">
                    <?php
                    foreach ($abroad as $key => $value) {
                        if ($key == 9) {
                            $class = 'last';
                        } else {
                            $class = '';
                        }
                        ?>
                        <li class="<?php echo $class ?>"><a href="#"><?php echo $value['name']?></a></li>
                    <?php } ?>
                </ul>
            </article>
            <article class="grid_8 prefix_2 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2486.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2515.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
            <article class="grid_8 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2518.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2521.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
        </div>
        <div class="wrapper">
            <article class="grid_6">
                <h2>Các dự án <span>liên doanh</span></h2>
                <ul class="list1">
                    <?php
                    foreach ($join as $key => $value) {
                        if ($key == 9) {
                            $class = 'last';
                        } else {
                            $class = '';
                        }
                        ?>
                        <li class="<?php echo $class ?>"><a href="#"><?php echo $value['name']?></a></li>
                    <?php } ?>
                </ul>
            </article>
            <article class="grid_8 prefix_2 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2523.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2524.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
            <article class="grid_8 pt">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2526.JPG" alt="" class="m_bot3 img" style="width: 310px; height: 176px">
                <img src="<?php echo Yii::app()->baseUrl?>/images/IMG_2527.JPG" alt="" class="img" style="width: 310px; height: 176px">
            </article>
        </div>
    </div>
</section>