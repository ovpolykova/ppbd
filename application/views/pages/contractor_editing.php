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
                <div class="modal fade" id="modalAdd1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAddLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modalAddLabel1">Добавление контрагента</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <form action="<?=base_url('Contractor_admin/add_action')?>" method="post">
                            <div class="modal-body">
                                <div class="p-4">

                                    

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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Наименование контрагент</th>
                    <th scope="col">Тип контрагент</th>
                    <th scope="col">Юр. адрес</th>
                    <th scope="col">Дата договора</th>
                    <th scope="col">ИНН</th>
                    <th scope="col">КПП</th>
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
                    <td>

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
                                <form action="<?=base_url('Contractor_admin/upd_action')?>" method="post">
                                <div class="modal-body">
                                    <div class="p-4">

                                        

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
                    <td><button class="btn btn-outline-danger">Удалить</button></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>