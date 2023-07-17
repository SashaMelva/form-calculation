<div class="container">
    <div class="row row-header">
        <div class="col-12">
            <img src="assets/img/logo.png" alt="logo" style="max-height:50px"/>
            <h1>Прокат</h1>
        </div>
    </div>
    <div class="row row-body">
        <div class="col-12">
            <h4>Дополнительные услуги:</h4>
            <ul>
                <?
                $services = unserialize($dbh->mselect_rows('a25_settings', ['set_key' => 'services'], 0, 1, 'id')[0]['set_value']);
                foreach($services as $k => $s) { ?>
                    <li><?=$k?>: <?=$s?></li>
                <?}
                ?>
            </ul>
        </div>
    </div>
    <!-- TODO: реализовать форму расчета -->
   <div class="row row-form">
        <div class="col-12">
            <h4>Форма расчета:</h4>
            <p></p>
        </div>
    </div>
</div>
