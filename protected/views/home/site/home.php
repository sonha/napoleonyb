<section id="content" class="cont_pad">
    <div class="container_24">
        <div class="wrapper">
            <article class="grid_8">
                <p class="p2"><img class="img" src="<?php echo Yii::app()->baseUrl?>/images/IMG_2486.JPG" alt="" style="width: 290px; height: 166px"></p>
                <h2>YFA <span> kính chào quý khách</span></h2>
                <div class="pr">
                    <!--<?php echo Utils::shorten_text($company_info['desc1'], 420); ?>-->
                    YFA luôn luôn tìm kiếm mở rộng kinh doanh của chúng tôi và tìm kiếm đối tác mới, quốc gia và những người quốc tế. Hơn nữa, YFA luôn luôn tôn trọng hỗ trợ và đóng góp của người bạn đời và có cơ hội để làm việc chặt chẽ với các đối tác càng nhiều càng tốt. YFA đảm bảo rằng chúng tôi luôn cung cấp những sản phẩm có chất lượng cao và giá cả hợp lý.
                    <br>
                    <br><br>
                    <a href="<?php echo $this->createUrl('/site/about')?>" class="button"><?php echo $label;?></a>
                </div>
            </article>
            <article class="grid_8">
                <div class="pl10">
                    <p class="p2"><img class="img" src="<?php echo Yii::app()->baseUrl?>/images/IMG_2514.JPG" alt="" style="width: 290px; height: 166px"></p>
                    <h2>Về <span>Chúng tôi</span></h2>
                    <p class="p3">
                        <?php echo Utils::shorten_text($company_info['desc2'], 600);?>
                    <a href="<?php echo $this->createUrl('/site/about')?>" class="button b_ind"><?php echo $label;?></a>
                </div>
            </article>
            <article class="grid_8">
                <div class="pl20">
                    <h2 class="t_ind ind">Dịch vụ <span>của chúng tôi</span></h2>
                    <ul class="ext_list serv_list">
                        <?php foreach ($service as $key => $value) {
                            if ($key == 2) {
                                $class = 'extra_last';
                            } else {
                                $class = '';
                            }
                            ?>
                            <li class="<?php echo $class ?>"">
                                <figure><?php echo ($key + 1)?></figure>
                                <div>
                                    <strong class="color1"><?php echo $value['name']?></strong>
                                </div>
                                <div class="text"><a href="<?php echo $this->createUrl('/site/service')?>"><?php echo $value['description']?></a></div>
                            </li>
                        <?php } ?>
                    </ul>
                    <a href="<?php echo $this->createUrl('/site/service')?>" class="button b_ind1"><?php echo $label;?></a>
                </div>
            </article>
        </div>
    </div>
</section>