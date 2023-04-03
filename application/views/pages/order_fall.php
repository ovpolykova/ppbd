<!-- Страница заказа, невыполненного в срок (для администратора)|Кузнецов -->
<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Отчёт заказов, не выполненных срок</h1>
            </div>
            <p class="lead text-center">Если дата отправки дольше 5 дней после даты заказа, то считается невыполненным.</p>
        </div>
    </div>

    <div class="" style="margin-top:100">
        <div class="rounded d-flex justify-content-center">
            <form action="<?=base_url('report/browse_order_fall')?>" method="post" class="row g-2 needs-validation">
                <div class="col-md-6">
                    <label for="date1" class="form-label">Дата С</label>
                    <input type="date" name="date1" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="date2" class="form-label">Дата ПО</label>
                    <input type="date" name="date2" class="form-control">
                </div>
                <div class="col-12" style="text-align: center; margin-top: 10px;">
                    <button type="submit" class="btn btn-primary">Найти</button>
                </div>
            </form>
        </div>
    </div>
    <?=$this->pagination->create_links()?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Номер заказа</th>
                <th scope="col">Контрагент</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата отправки</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($order_fall as $row)
            { ?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['contractor']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
                <td><?=$row['status']?></td>
                <td>
            </tr>
            <?php }?>
            
        </tbody>


    </table>
</div>
