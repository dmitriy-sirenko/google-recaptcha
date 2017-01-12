##Google ReCaptcha simple service

###Integration

- Client side integration
    Before the closing "head" tag paste javasript.
```
    <script src='https://www.google.com/recaptcha/api.js'></script>
```

- Client side paste in form PHP code
```
    if (ReCaptcha::getInstance()->isEnabled()) {
		    echo ReCaptcha::getInstance()->htmlFormCode();
    } 
```

- Server side settings from https://www.google.com/recaptcha/
```
define("RECAPTCHA_ENABLED", true);
define("RECAPTCHA_SECRET_KEY", "3324dfsfmiurhf3yrh3fhjsdfkjndskc");
define("RECAPTCHA_SITE_KEY", "ncwiucnewi7wf8ewhudbejbcwjbcjcb");
```

- Server side Check captcha
```    
if (ReCaptcha::getInstance()->isEnabled() && ReCaptcha::getInstance()->checkCaptcha() === false) {
    // проверка каптчи не пройдена
}
```
