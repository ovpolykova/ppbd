<div class="container">
    <form>
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
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