<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

 $__time = array();

$mtime = microtime();		//Считываем текущее время
$mtime = explode(" ",$mtime);	//Разделяем секунды и миллисекунды
// Составляем одно число из секунд и миллисекунд
// и записываем стартовое время в переменную
$tstart = $mtime[1] + $mtime[0];

$__time['load'] = $tstart;

function __setPoint($id) {
	global $__time;
	
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$__time[$id] = array($mtime, memory_get_usage()/(1024*1024));
}

function __getPoints() {
	global $__time;
	
	if(count($__time)) {
		echo '<!--';
		$last = 0;
		foreach($__time as $k => $v) {
			//echo $k.': '.($v[0] - $last).' ('.$v[0].', '.$v[1].')'."\n";
			$last = $v;
		}
		echo '-->';
	}
	
	$__time = array();
}



define( 'WP_AUTO_UPDATE_CORE', false );

define('WP_ALLOW_MULTISITE', false);
define('MULTISITE', false);

//define('WP_POST_REVISIONS', false);
//define('EMPTY_TRASH_DAYS', 0);

define('WP_CACHE', true); //Added by WP-Cache Manager
define('WPCACHEHOME', '/var/www/orel-print.ru/html/wp-content/cache/'); //Added by WP-Cache Manager

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //

/** Имя базы данных для WordPress */
define('DB_NAME', 'orel_print_ru');

/** Имя пользователя MySQL */
define('DB_USER', 'orel_print_ru');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'orel_print_ru');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W6081m%O<{FG_van$HCHASS>Or?Ap183dJZ3IY6cn+D(^G-0r4I-Qk6J+-5C1');
define('SECURE_AUTH_KEY',  '*VMozF`Y}WN()ry>WMoVE8RpHxM7l)p183dp~^[l%h|!aG0]:z)uED+]m,!-l(');
define('LOGGED_IN_KEY',    'x!)^^U_7T,7o/5x;pX:L CDE2KDsG,*R8vw>r8$#.k~Sp183d.[oB+im;JuPQ7H-');
define('NONCE_KEY',        'B1&6C1qY8m>!Jc|&frZOhfV>p183dT{%*Uv4S=4vc;rm_{!zY~UK^Mkz:k}8Rhf');
define('AUTH_SALT',        'FZN*DZb_mUzLfblCiw4k||. :Q,xBp183d!OlL=: |_$N!834aQK?s|iE#dL#kt');
define('SECURE_AUTH_SALT', 'WO%H*:*L/,-j|0(?+<Nag-$p183d:@|M^O|pn:R k+siC.DuCC|vN-a]hG,UVAq');
define('LOGGED_IN_SALT',   'eA9A=4rFo5uGj5a(c+(~Lf@0p183dj<#-<u-(#+j,CB79$I6)fVfC]Q<|wl_|HW');
define('NONCE_SALT',       ';$C-z@&F,md(xE|Rjx+Rb5pzIo;0p183d6>P{ctm*R8!7?%;YN!iNisV#mydta3V');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'p183d_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if (strpos($_SERVER['REQUEST_URI'], 'wp-admin')) define ('WPLANG', 'ru_RU'); else define ('WPLANG', 'ru_RU_lite');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
