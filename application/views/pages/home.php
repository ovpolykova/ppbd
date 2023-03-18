<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="<?=asset_url()?>/img/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold">Centered hero</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
        </div>
    </div>
</div>

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