<?php
require_once 'views/header.php';
?>



    <div id="block_test">
        <div class="test-btn "><a href="/account/task_1/">Вывести список email'ов, встречающихся более чем у 1 пользователя</a></div>
        <div class="test-btn"><a href="/account/task_2/">Вывести список логинов пользователей, которые не сделали ни одного заказа</a></div>
        <div class="test-btn activ"><a href="/account/task_3/">Вывести список логинов пользователей, которые cделали более 2 заказов ( > 2 )</a></div>

        <span class="label">Результат:</span>
        <div id="block_result" class="clear">

        <?php

        if(isset($this->task3)){
        if(isset($this->task3['error']) ){
            echo 'Совпадений не найдено';
        }else{
            foreach ($this->task3 as $value)
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