<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Отчёт по товарам</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <form  method="POST" action="<?=base_url('Report_order_product/sel_rep_order_product')?>" class="row g-2 needs-validation">
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
                </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Наименование товара</th>
                    <th scope="col">Общая сумма</th>
                </tr>
            </thead>
            <!-- <tbody>
            <?php foreach ($contract as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_order']?></th>
                    <td><?=$row['ID_contract']?></td>
                    <td><?=$row['SUM(count*price)']?></td>
                </tr>
                <?php }?>
            </tbody> -->
        </table>
    </div>
</div>