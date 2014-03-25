<?php
    return CMap::mergeArray(
        require(dirname(__FILE__) . '/main.php'),
        array(
            'name'     => 'Shoe Shop',
            'language' => 'vi',
            'defaultController' => 'napoleon',
        )
    );
?>