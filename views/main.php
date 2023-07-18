<div class="container">
    <div class="row row-header">
        <div class="col-12">
            <img src="assets/img/logo.png" alt="logo" style="max-height:50px"/>
            <h1>Прокат</h1>
        </div>
    </div>
    <div class="row row-form">
        <div class="col-12">
            <h4>Форма расчета:</h4>
            <div class="row row-body">
                <div class="col-9">
                    <form action="/calculate" method="POST" id="form">
                        <label class="form-label" for="product">Выберите продукт:</label>
                        <select class="form-select" name="product" id="product">
                            <?php foreach ($this->arguments['products'] as $product):?>
                                <option value="<?= $product['ID'] ?>"><?= $product['NAME'] ?> за <?= $product['PRICE'] ?></option>
                            <?php endforeach?>
                        </select>

                        <label for="countDay" class="form-label">Количество дней:</label>
                        <input type="number" class="form-control" id="countDay" name="countDay" min="1" max="30" onchange="updatePrise(this)" required>
                        <div>
                            <p>Цена по тарифу за авто в день: <span id="price"></span></p>
                        </div>

                        <label for="customRange1" class="form-label">Дополнительно:</label>

                        <?php $j = 1;
                        foreach ($this->arguments['services'] as $name => $price) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services<?= $j ?>-<?= $price ?>" value="<?= $price ?>" id="flexCheckChecked<?= $j ?>">
                                <label class="form-check-label" for="flexCheckChecked1">
                                    <?= $name ?> за <?= $price ?>
                                </label>
                            </div>
                            <?php $j += 1;
                        endforeach ?>
                        <button type="submit" class="btn btn-primary">Рассчитать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
