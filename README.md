##Google ReCaptcha simple service

###Integration

####Client side

- Before the closing "head" tag paste javasript.
```
    <script src='https://www.google.com/recaptcha/api.js'></script>
```

- Paste PHP code into html form
```
    if (ReCaptcha::getInstance()->isEnabled()) {
		    echo ReCaptcha::getInstance()->htmlFormCode();
    } 
```

####Server side

- Include class ReCaptcha.class.php

- Settings from https://www.google.com/recaptcha/
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
