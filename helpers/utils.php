<?php
use Core\Arr;
use Core\Lang;

function setLang($locale = 'vi')
{
    lang::setLang($locale);
}

function getLangText($key)
{
    return Lang::getText($key);
}

function _text($key)
{
    echo getLangText($key);
}

function checkLang()
{
    $lang = $_GET['lang']??($_SESSION['lang']??'vi');
    $_SESSION['lang'] = $lang;
    setLang($lang);
}
/**
 * 
 * @return string trả về key của ngôn nữ hiện tại
 */
function getLocale() : string
{
    return Lang::getLocale();
}