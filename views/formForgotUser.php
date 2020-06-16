<form method="post" action="controllers/cCadastrar.php">
    <div class="form-group">
        <label>E-mail *</label>
        <input type="email" name="email" class="form-control" placeholder="Insira seu e-mail" aria-describedby="emailHelp" required>
    </div>
    <?php require_once('recaptcha.php')?>
    <div class="row" id="button">
        <div class="col">
            <button id="signup" type="submit" class="btn btn-success my-2">Enviar</button>
        </div>
    </div>

    <div class="row align-center">
        <div class="col-12">
            <button class="btn btn-outline-info" id="back">Voltar</button>
        </div>
    </div>
</form>