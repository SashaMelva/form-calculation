<div class="row row-body">
    <div class="col-9">
        <form action="" id="form">
            <label class="form-label" for="product">Выберите продукт:</label>
            <select class="form-select" name="product" id="product">
                <?php foreach ($this->arguments['products'] as $product):?>
                <option value="<?= $product['ID'] ?>"><?= $product['NAME'] ?> за <?= $product['PRICE'] ?></option>
                <?php endforeach?>
            </select>

            <label for="customRange1" class="form-label">Количество дней:</label>
            <input type="text" class="form-control" id="customRange1" min="1" max="30">

            <label for="customRange1" class="form-label">Дополнительно:</label>

            <?php $j = 1;
            foreach ($this->arguments['services'] as $name => $price) : ?>
            <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="<?= $name ?>" id="flexCheckChecked<?= $j ?>" checked>
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