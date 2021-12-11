<?php
require_once 'views/header.php';
?>



    <div id="block_test">
        <?php include 'views/account/include/menu.php';?>

        <span class="label">Результат:</span>

        <div id="block_result" class="clear">

        <?php
        if(isset($this->task1)){
        if(isset($this->task1['error']) ){
            echo 'Совпадений не найдено';
        }else{
            foreach ($this->task1 as $value)
            {
                echo $value['email'].'<br>' ;
            }
        }
        }
        ?>
        </div>
    </div>


<?php
require_once 'views/footer.php';
?>