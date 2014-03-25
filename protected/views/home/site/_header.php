<div class="head_wrap">
    <header>
        <h1><a class="logo" href="http://yfa.com.vn/">YFA Company Limited</a></h1>
        <nav>
            <ul class="sf-menu sf-js-enabled">
                <li class="current"><a href="http://yfa.com.vn/">Trang chủ</a></li>
                <li><a href="<?php echo $this->createUrl('/site/about')?>">Giới thiệu</a></li>
                <li><a href="#" class="sf-with-ul">Sản phẩm<span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <?php
                        $all_product = Product::getAllProduct();
                        foreach($all_product as $product) {
                        ?>
                        <li><a href="<?php echo $this->createUrl('/site/detail', array('id' => $product['id'])) ?>"><?php echo $product['name'];?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <li><a href="<?php echo $this->createUrl('/site/service')?>">Dịch vụ</a></li>
                <li><a href="<?php echo $this->createUrl('/site/project')?>">Đối tác</a></li>
                <li><a href="<?php echo $this->createUrl('/site/contact') ?>">Liên hệ</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
    </header>
</div>