<div class="container">
    <div class="row row-body">
        <div class="col-3">
            <span style="text-align: center">Форма обратной связи</span>
            <i class="bi bi-activity"></i>
        </div>
        <div class="col-9">
            <form action="" id="form">
                <label class="form-label" for="product">Выберите продукт:</label>
                <select class="form-select" name="product" id="product">
                    <option value="100">Продукт 1 за 100</option>
                    <option value="200">Продукт 2 за 200</option>
                    <option value="300">Продукт 3 за 300</option>
                    <option value="400">Продукт 4 за 400</option>
                </select>

                <label for="customRange1" class="form-label">Количество дней:</label>
                <input type="text" class="form-control" id="customRange1" min="1" max="30">

                <label for="customRange1" class="form-label">Дополнительно:</label>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="100" id="flexCheckChecked1" checked>
                    <label class="form-check-label" for="flexCheckChecked1">
                        Дополнительно 1 за 100
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="200" id="flexCheckChecked2" checked>
                    <label class="form-check-label" for="flexCheckChecked1">
                        Дополнительно 2 за 200
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Рассчитать</button>
            </form>
        </div>
    </div>
</div>