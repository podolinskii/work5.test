<?php
require_once 'views/header.php';
?>



    <div id="block_test">
        <?php include 'views/account/include/menu.php';?>

        <span class="label">Результат:</span>
        <div id="block_result" class="clear">

        <?php

        if(isset($this->task2)){
        if(isset($this->task2['error']) ){
            echo 'Совпадений не найдено';
        }else{
            foreach ($this->task2 as $value)
            {
                echo $value['login'].'<br>' ;
            }
        }
        }

        ?>
</div>
    </div>


<?php
require_once 'views/footer.php';
?>