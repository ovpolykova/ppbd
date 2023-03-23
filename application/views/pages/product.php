<!-- Страница товара (для администратора)|Кузнецов -->
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="display-6 text-success text-center"><?=$this->session->flashdata('success_add_product')?></h1>
            <form action="<?=base_url('product/add_product')?>" method="post">
                <div class="mb-3">
                    <label for="name_product" class="form-label">Наименование товара</label>
                    <input type="text" class="form-control" name="name_product">
                </div>

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="ID_group" class="form-label">Группа</label>
                        <select class="form-select" name="ID_group">

                            <?php foreach ($group as $row) {?>
                            <option value="<?=$row['ID_group']?>"><?=$row['name_g']?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="image" class="form-label">Изображение</label>
                        <input type="file" class="form-select" name="image"></select>
                    </div>
                    <div class="col-md-2">
                        <label for="unit" class="form-label">Единица</label>
                        <select class="form-select" name="unit">
                            <option value="шт">шт</option>
                            <option value="пог.м">пог.м</option>
                            <option value="рул.">рул.</option>
                            <option value="лист">лист</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>

        </div>
        <div class="col-4"></div>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Товар</th>
                <th scope="col">№Прайс-лист</th>
                <th scope="col">Единица</th>
                <th scope="col">Цена</th>
                <th scope="col">Валюта</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($product as $row)
            { ?>
            <tr>
                <th scope="row"><?=$row['ID_product']?></th>
                <td><?=$row['name_product']?></td>
                <td><?=$row['ID_list']?></td>
                <td><?=$row['unit']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['valuta']?></td>
                <td>
                    <!-- Триггер -->
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_list']?>">Изменить цену</button>
                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_list']?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?=base_url('product/upd_price_product')?>" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить цену товара к прайс-листу №<?=$row['ID_list']?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="ID_list" value="<?=$row['ID_list']?>">
                                        <input type="hidden" name="ID_product" value="<?=$row['ID_product']?>">
                                        <input type="hidden" name="ID_type_t" value="<?=$row['ID_type_t']?>">
                                        <input type="hidden" name="ID_valuta" value="<?=$row['ID_valuta']?>">

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="price" class="form-label">Цена</label>
                                                <input type="number" class="form-control" name="price" min="0" step="0.01" value="<?=$row['price']?>">      
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="<?=base_url('product/del_product')?>" method="post">
                        <button class="btn btn-outline-danger" name="ID_product" value="<?=$row['ID_product']?>">Удалить</button></td>
                    </form>
                </td>
            </tr>
            <?php }?>
            
        </tbody>


    </table>
</div>

