<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">ФИО</th>
                <th scope="col">Производство</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Наименование продукт</th>
                <th scope="col">Количество</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата отправки</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($browesorder as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['fio']?></td>
                <td><?=$row['name_p']?></td>
                <td><?=$row['contractor']?></td>
                <td><?=$row['name_product']?></td>
                <td><?=$row['count']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
                <td><?=$row['status']?></td>
              
            </tr>
            <?php }?>
        </tbody>
    </table>


        </div>
        <div class="col-lg-1"></div>
    </div>
</div>