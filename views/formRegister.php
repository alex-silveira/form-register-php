<form method="post" action="controllers/cCadastrar.php">
    <div class="form-group">
        <label>Usuário *</label>
        <input type="text" name="user" class="form-control" placeholder="Insira seu nome de usuário" required>
    </div>

    <div class="form-group">
        <label>E-mail *</label>
        <input type="email" name="email" class="form-control" placeholder="Insira seu e-mail" required>
    </div>

    <div class="form-group">
        <label>Senha *</label>
        <input type="password" name="password" class="form-control" placeholder="Insira sua senha" required>
    </div>

    <div class="form-group">
        <label>Repita a senha *</label>
        <input type="password" name="cPassword" class="form-control" placeholder="Confirme sua senha" required>
    </div>

    <?php require_once('recaptcha.php')?>

    <div class="row" id="button">
        <div class="col-12">
            <button id="signup" type="submit" class="btn btn-success my-2">REGISTRAR</button>
        </div>
    </div>

    <div class="row" id="forgot">
        <div class="col-6">
            <button class="btn btn-outline-info" id="forgotUser">Esqueceu o usuário?</button>
        </div>

        <div class="col-6">
            <button class="btn btn-outline-info" id="forgotPassword">Esqueceu a senha?</button>
        </div>
    </div>
</form>
