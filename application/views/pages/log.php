<div class="container">
    <div class="container-fluid vh-100" style="margin-top:80px">
        <div class="" style="margin-top:100">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">АВТОРИЗАЦИЯ</h3>
                    </div>
                    <form action="<?=base_url('login/log_action')?>" method="post">
                        <div class="p-4">

                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" class="form-control" name="login" placeholder="Логин" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" class="form-control" name="password" placeholder="Пароль" required>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary text-center mt-2 text-align-text" type="submit">Войти</button>
                            </div>

                            <?php
                            if ($this->session->flashdata('success'))
                            {?>
                                <p class="text-success text-center"><?=$this->session->flashdata('success')?></p>
                            <?php }
                            if ($this->session->flashdata('login_false'))
                            {?>
                                <p class="text-danger text-center"><?=$this->session->flashdata('login_false')?></p>
                            <?php }
                            ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>