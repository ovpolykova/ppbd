<!-- Страница товара (для администратора)|Кузнецов -->
<div class="container">
    <h1 class="display-3 text-center mb-5">Прайс-лист</h1>
    <div class="row">
        <div class="col-3">
            <h5 class="text-center">Добавление тип прайс-листа</h5>
            <form action="<?=base_url('product/add_type_t')?>" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="type_t">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
        </div>
        <div class="col-9">
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Тип прайс-листа</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($type_t as $row) {?>
                    <tr>
                        <th scope="row"><?=$row['ID_type_t']?></th>
                        <td><?=$row['type_t']?></td>
                        <td>
                            <!-- Кнопка-триггер модального окна -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$row['ID_type_t']?>">
                                Изменить
                            </button>
                            </form>
                                <!-- Модальное окно -->
                                <form action="<?=base_url('product/upd_type_t')?>" method="post">
                                    <div class="modal fade" id="modal<?=$row['ID_type_t']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row['type_t']?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                                </div>

                                                <input type="hidden" name="ID_type_t" value="<?=$row['ID_type_t']?>">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="type_t" class="form-label">Название типа прайс-листа</label>
                                                        <input type="text" class="form-control" name="type_t" value="<?=$row['type_t']?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </td>
                        <td>
                            <form action="<?=base_url('product/del_type_t')?>" method="post">
                                <input type="hidden" name="ID_type_t" value="<?=$row['ID_type_t']?>">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
