<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Мои заказы</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <form  method="POST" action="<?=base_url('report/browse_rep_order_contract')?>" class="row g-2 needs-validation">
                <div class="col-md-6">
                    <label for="exampleInputEmail" class="form-label">Выберите контрагенты</label>
                    <select class="form-select" name="contractor" aria-label="Пример выбора по умолчанию">
                        <?php foreach ($contract as $row) {?>
                        <option value="<?=$row['ID_contract']?>"><?=$row['contractor']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail" class="form-label">Введите кол-во</label>
                    <input type="text" name="col" class="form-control">
                </div>
                <div class="col-12" style="text-align: center; margin-top: 10px;">
                    <button type="submit" class="btn btn-primary">Заказать</button>
                </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Наименование контрагента</th>
                    <th scope="col">Наименование товара</th>
                    <th scope="col">Кол-во</th>
                    <th scope="col">Дата заказа</th>
                    <th scope="col">Дата отправка</th>
                    <th scope="col">Статус</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($order as $row) {?>
                <tr>
                    <td><?=$row['contractor']?></td>
                    <td><?=$row['name_product']?></td>
                    <td><?=$row['count']?></td>
                    <td><?=$row['date_order']?></td>
                    <td><?=$row['date_send']?></td>
                    <td><?=$row['status']?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>