<?php

/**
 * Class ReCaptcha
 * @author Dmitriy Sirenko dmitriy.sirenko@gmail.com
 */

class ReCaptcha
{
    private static $instance;

    private $enabled = false;
    private $secretKey;
    private $siteKey;

    public function __construct()
    {
        if (defined("RECAPTCHA_ENABLED")) {
            $this->enabled = RECAPTCHA_ENABLED;
        }
        if (defined("RECAPTCHA_SECRET_KEY")) {
            $this->secretKey = RECAPTCHA_SECRET_KEY;
        }

        if (defined("RECAPTCHA_SITE_KEY")) {
            $this->siteKey = RECAPTCHA_SITE_KEY;
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * check enable of captcha service
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * check captcha
     * @return bool
     */
    public function checkCaptcha()
    {
        if (!isset($_REQUEST['g-recaptcha-response'])) {
            return false;
        }

        $gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
        $ip = $_SERVER['REMOTE_ADDR'];

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->secretKey
            . "&response=" . $gRecaptchaResponse
            . "&remoteip=" . $ip);

        $response = json_decode($response, true);
        if (!is_null($response) && $response["success"] == "true") {
           return true;
        } else {
            return false;
        }
    }

    /**
     * show captcha in html form
     * @return string
     */
    public function htmlFormCode()
    {
        return  '<div class="g-recaptcha" data-sitekey="'.$this->siteKey.'"></div>';
    }

}
