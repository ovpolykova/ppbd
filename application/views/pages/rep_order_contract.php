<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Отчёт по контрагентов</h1>
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
                    <label for="exampleInputEmail" class="form-label">Дата С</label>
                    <input type="date" name="date1" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail" class="form-label">Дата ПО</label>
                    <input type="date" name="date2" class="form-control">
                </div>
                <div class="col-12" style="text-align: center; margin-top: 10px;">
                    <button type="submit" class="btn btn-primary">Найти</button>
                    <a href="<?=base_url('rep_order_contract/browse_rep_order_contract')?>" class="btn btn-danger">Очистить</a>
                </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Наименование контрагента</th>
                    <th scope="col">Общая сумма</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($order as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_order']?></th>
                    <td><?=$row['contractor']?></td>
                    <td><?=$row['SUM(price*count)']?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>