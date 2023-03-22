<!-- Страница товара (для администратора)|Кузнецов -->
<div class="container">
    <div class="row">
        <div class="col-8">

            <form action="">
                <div class="mb-3">
                    <label for="name_product" class="form-label">Наименование товара</label>
                    <input type="text" class="form-control" id="name_product">
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="name_g" class="form-label">Группа</label>
                        <select class="form-select" name="name_g">
                            <option value="1">Один</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="unit" class="form-label">Единица</label>
                        <select class="form-select" name="unit">
                            <option value="1">Один</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
            </form>

        </div>
        <div class="col-4"></div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Название продуктов</th>
                <th scope="col">Группа</th>
                <th scope="col">Единица</th>
                <th scope="col">Описание</th>
                <th scope="col">Изображение</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($product as $row)
            { ?>
            <tr>
                <th scope="row"><?=$row['ID_product']?></th>
                <td><?=$row['name_product']?></td>
                <td><?=$row['ID_group']?></td>
                <td><?=$row['unit']?></td>
                <td><?=$row['description']?></td>
                <td><?=$row['image']?></td>
                <td><button class="btn btn-outline-primary">Изменить</button></td>
                <td><button class="btn btn-outline-danger">Удалить</button></td>
            </tr>
            <?php }?>
            
        </tbody>
    </table>
</div>

