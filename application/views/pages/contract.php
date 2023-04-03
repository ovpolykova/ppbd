<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Справочник контрагентов</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd1">
                Добавить контрагента
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="modalAdd1" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalAddLabel1">Добавление контрагента</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <form action="<?=base_url('contract/add_contract')?>" method="post">
                            <div class="modal-body">
                                <div class="p-4">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="contractor" placeholder="Наименование контрагента" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <select class="form-select" name="ID_type_c">
                                            <option value="1">Физическое лицо</option>
                                            <option value="2">Юридическое лицо</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="address_c" placeholder="Юр. адрес" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="date" class="form-control" name="date_c" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="inn" placeholder="ИНН" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="kpp" placeholder="КПП" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="login" placeholder="Логин" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="password" placeholder="Пароль" required>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Добавляется</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <?=$this->pagination->create_links()?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Наименование контрагента</th>
                    <th scope="col">Тип контрагента</th>
                    <th scope="col">Юр. адрес</th>
                    <th scope="col">Дата договора</th>
                    <th scope="col">ИНН</th>
                    <th scope="col">КПП</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Пароль</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($contract as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_contract']?></th>
                    <td><?=$row['contractor']?></td>
                    <td><?=$row['type_c']?></td>
                    <td><?=$row['address_c']?></td>
                    <td><?=$row['date_c']?></td>
                    <td><?=$row['inn']?></td>
                    <td><?=$row['kpp']?></td>
                    <td><?=$row['login']?></td>
                    <td><?=$row['password']?></td>
                    <td>

                    <!-- Триггер -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_contract']?>">
                    Изменить
                    </button>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_contract']?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="<?=base_url('contract/upd_contract')?>" method="post">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalAddLabel2">Редактирование пользователя №<?=$row['ID_contract']?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="p-4">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="ID_contract" required value="<?=$row['ID_contract']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="contractor" placeholder="Наименование контрагента" required value="<?=$row['contractor']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <select class="form-select" name="ID_type_c">
                                            <option value="1">Физическое лицо</option>
                                            <option value="2">Юридическое лицо</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="address_c" placeholder="Юр. адрес" required value="<?=$row['address_c']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="date" class="form-control" name="date_c" required value="<?=$row['date_c']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="inn" placeholder="ИНН" required value="<?=$row['inn']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="kpp" placeholder="КПП" required value="<?=$row['kpp']?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="login" placeholder="Логин" value="<?=$row['login']?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="password" placeholder="Пароль" value="<?=$row['password']?>" required>
                                    </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                    <button type="submit" class="btn btn-primary">Изменяться</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    </td>
                    <td>
                    <form action="<?=base_url('contract/del_contract')?>" method="post">
                        <button class="btn btn-outline-danger" name="ID_contract" value="<?=$row['ID_contract']?>">Удалить</button></td>
                    </form>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>