<form method="post" action="http://hero.com.br:82/controllers/cResetPassword.php?key=<?php echo $key ?>">

    <div class="form-group">
        <label>Senha *</label>
        <input type="password" name="password" class="form-control" placeholder="Insira sua nova senha" required>
    </div>

    <div class="form-group">
        <label>Repita a senha *</label>
        <input type="password" name="cPassword" class="form-control" placeholder="Confirme sua senha" required>
    </div>

    <?php require_once('recaptcha.php')?>

    <div class="row" id="button">
        <div class="col-12">
            <button id="signup" type="submit" class="btn btn-success my-2">Enviar</button>
        </div>
    </div>

</form>