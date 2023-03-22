<div class="container">
    <div class="container-fluid" style="margin-top:40px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <h1>Справочник пользователей</h1>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container-fluid" style="margin-top:20px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd1">
                Добавить пользователя
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="modalAdd1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalAddLabel1">Добавление пользователя</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <form action="<?=base_url('User/add_action')?>" method="post">
                            <div class="modal-body">
                                <div class="p-4">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <input type="text" class="form-control" name="fio" placeholder="ФИО" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                        <select class="form-select" name="role">
                                            <option value="Оператор">Оператор</option>
                                            <option value="Контрагент">Контрагент</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                        <input type="text" class="form-control" name="login" placeholder="Логин" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                        <input type="password" class="form-control" name="repassword" placeholder="Подтверждение пароля" required>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Зарегистроваться</button>
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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Пароль</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $row) {?>
                <tr>
                    <th scope="row"><?=$row['ID_user']?></th>
                    <td><?=$row['fio']?></td>
                    <td><?=$row['role']?></td>
                    <td><?=$row['login']?></td>
                    <td><?=$row['password']?></td>
                    <td>

                    <!-- <a href="<?=base_url('User/upd_action')?>?ID_user='.$row['ID_user'].'"> -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalAdd2">
                    Изменить
                    </button>

                    <!-- Модальное окно -->
                    <div class="modal fade" id="modalAdd2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalAddLabel2">Редактирование пользователя</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <form action="<?=base_url('User/upd_action')?>" method="post">
                                <div class="modal-body">
                                    <div class="p-4">

                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                            <input type="text" class="form-control" name="fio" placeholder="ФИО" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-primary"><i class="bi bi-person-vcard text-white"></i></span>
                                            <select class="form-select" name="role">
                                                <option value="Оператор">Оператор</option>
                                                <option value="Контрагент">Контрагент</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                            <input type="text" class="form-control" name="login" placeholder="Логин" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                            <input type="password" class="form-control" name="password" placeholder="Пароль" required>
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
                    <td><!--<a href="<?=base_url('User/del_action')?>?ID_user='.$row['ID_user'].'"> -->
                    <button class="btn btn-outline-danger">Удалить</button></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>