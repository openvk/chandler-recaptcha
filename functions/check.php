<?php declare(strict_types=1);
use ReCaptcha\ReCaptcha;

function check_captcha(?string $input = NULL): bool
{
    if(!CHANDLER_RECAPTCHA_ROOT_CONF["chandler-recaptcha"]["active"])
        return true;
    
    if(!$input)
        $input = $_POST["g-recaptcha-response"];
    
    $captcha  = new ReCaptcha(CHANDLER_RECAPTCHA_ROOT_CONF["chandler-recaptcha"]["privateKey"]);
    $response = $captcha->verify($input, CONNECTING_IP);
    
    return $response->isSuccess();
}
