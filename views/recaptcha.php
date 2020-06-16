<?php
$n1 = rand(1, 100);
$n2 = rand(1, 100);
$result = $n1 + $n2;
?>

<div class="row" id="button">
    <div class="col">
        <p class="text-center">Qual o resultado de <?php echo $n1." + ". $n2 ?><input class="form-control" type="text" name="captcha" required/></p>
        <input type="hidden" id="result" name="captchaResult" value="<?php echo $result ?>"/>
    </div>
</div>