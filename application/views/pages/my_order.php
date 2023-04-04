<!-- Мои заказы|Волобуев НОВЫЙ!!!-->
<div class="container">
    <h2 class="text-center">Мои заказы</h2>

    <!-- Скрипт для пагинации -->
    <script>
        $(document).ready(function () {
        $('#my_order').DataTable();
    });
    </script>

    <table id="my_order" class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Товар</th>
                <th scope="col">Количество</th>
                <th scope="col">Валюта</th>
                <th scope="col">Цена</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата Отправки</th>
                <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($my_order as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['name_product']?></td>
                <td><?=$row['count']?></td>
                <td><?=$row['valuta']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
                <td><?=$row['status']?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>