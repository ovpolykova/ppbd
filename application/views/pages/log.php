<div class="container">
    <form role="form" method="post" action="login">
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" name="login" value="<?php echo set_value('login');?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>