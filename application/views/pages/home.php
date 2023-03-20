<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="<?=asset_url()?>/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold">Добро пожаловать,
        <?php
        if (!empty($session))
        {
            echo 'контрагент '.$session['fio'].'!';
        }
        else
        {?>
            гость!
        <?php }?>
    </h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Заказывайте что-нибудь!</p>
    </div>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование товара</th>
                <th scope="col">Группа</th>
                <th scope="col">Единица</th>
                <th scope="col">Описание</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tovar as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_tovar']?></th>
                <td><?=$row['name_t']?></td>
                <td><?=$row['ID_group']?></td>
                <td><?=$row['unit']?></td>
                <td><?=$row['description']?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>