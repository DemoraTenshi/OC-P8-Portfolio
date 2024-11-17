<?php
function getBrowserLanguage()
{
    $languages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $language = $languages[0]; // Prendre la première langue de la liste
    return substr($language, 0, 2); // Retourne seulement le code de langue (ex: 'en', 'fr')
}

function loadTranslations($language)
{
    $supportedLanguages = ['en', 'fr'];
    $language = in_array($language, $supportedLanguages) ? $language : 'en';
    return include __DIR__ . "/../lang/{$language}.php";
}
