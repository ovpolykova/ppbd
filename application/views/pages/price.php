<!-- Страница прайс-листа (для администратора) с модал. окна – добавить прайс-лист|Кузнецов -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-6 text-success text-center"><?=$this->session->flashdata('success_add_price')?></h1>
            <form action="<?=base_url('price/add_price')?>" method="post">

                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="ID_product" class="form-label">Товар</label>
                        <select class="form-select" name="ID_product">

                            <?php foreach ($product as $row) {?>
                            <option value="<?=$row['ID_product']?>"><?=$row['name_product']?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="ID_type_t" class="form-label">Тип товара</label>
                        <select class="form-select" name="ID_type_t">

                            <?php foreach ($type_t as $row) {?>
                            <option value="<?=$row['ID_type_t']?>"><?=$row['type_t']?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="ID_valuta" class="form-label">Валюта</label>
                        <select class="form-select" name="ID_valuta">

                            <?php foreach ($valuta as $row) {?>
                            <option value="<?=$row['ID_valuta']?>"><?=$row['valuta']?></option>
                            <?php }?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="price" class="form-label">Цена</label>
                        <input type="number" class="form-control" name="price" min="0" step="0.01">      
                    </div>
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
                <th scope="col">Тип товара</th>
                <th scope="col">Валюта</th>
                <th scope="col">Цена</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($price_list as $row)
            { ?>
            <tr>
                <th scope="row"><?=$row['ID_list']?></th>
                <td><?=$row['name_product']?></td>
                <td><?=$row['type_t']?></td>
                <td><?=$row['valuta']?></td>
                <td><?=$row['price']?></td>
                <td>
                    <!-- Триггер -->
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_list']?>">Изменить</button>
                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_list']?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?=base_url('price/upd_price')?>">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить прайс-лист №<?=$row['ID_list']?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="ID_list" value="<?=$row['ID_list']?>">
                                        <div class="row mb-3">

                                            <div class="col-md-12">
                                                <label for="ID_product" class="form-label">Товар</label>
                                                <select class="form-select" name="ID_product">
                                                    <option value="<?=$row['ID_product']?>" selected><?=$row['name_product']?></option>
                                                    
                                                    <?php foreach ($product as $row1) {?>
                                                    <option value="<?=$row1['ID_product']?>"><?=$row1['name_product']?></option>
                                                    <?php }?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="ID_type_t" class="form-label">Тип товара</label>
                                                <select class="form-select" name="ID_type_t">
                                                    <option value="<?=$row['ID_type_t']?>" selected><?=$row['type_t']?></option>

                                                    <?php foreach ($type_t as $row1) {?>
                                                    <option value="<?=$row1['ID_type_t']?>"><?=$row1['type_t']?></option>
                                                    <?php }?>

                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="ID_valuta" class="form-label">Валюта</label>
                                                <select class="form-select" name="ID_valuta">
                                                    <option value="<?=$row['ID_valuta']?>" selected><?=$row['valuta']?></option>

                                                    <?php foreach ($valuta as $row1) {?>
                                                    <option value="<?=$row1['ID_valuta']?>"><?=$row1['valuta']?></option>
                                                    <?php }?>

                                                </select>
                                            </div>

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
                    <form action="<?=base_url('price/del_price')?>" method="post">
                        <button class="btn btn-outline-danger" name="ID_list" value="<?=$row['ID_list']?>">Удалить</button>
                    </form>
                </td>
            </tr>


            <?php }?>
            
        </tbody>


    </table>
</div>