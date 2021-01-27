<?php declare(strict_types=1);

function captcha_template(): string
{
    if(!CHANDLER_RECAPTCHA_ROOT_CONF["chandler-recaptcha"]["active"])
        return "You have already verified that you are not a robot.";
    
    $theme = CHANDLER_RECAPTCHA_ROOT_CONF["chandler-recaptcha"]["lightTheme"] ? "light" : "dark";
    $pkey  = CHANDLER_RECAPTCHA_ROOT_CONF["chandler-recaptcha"]["publicKey"];
    $html  = "<div class=\"g-recaptcha\" data-sitekey=\"$pkey\" data-theme=\"$theme\" data-size=\"compact\"></div>";
    
    if(!defined("RECAPTCHA_INITIALIZED")) {
        $html = "<script src='https://www.google.com/recaptcha/api.js'></script>" . $html;
        
        define("RECAPTCHA_INITIALIZED", true);
    }
    
    return $html;
}
