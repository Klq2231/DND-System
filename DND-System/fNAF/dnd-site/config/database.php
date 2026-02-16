<?php
// Настройки локальной базы данных
define('DB_HOST', 'localhost');
define('DB_NAME', 'DND-System'); // Ваше новое название
define('DB_USER', 'root');       // Стандартный логин XAMPP/OpenServer
define('DB_PASS', '');           // Стандартный пароль (пустой)
define('DB_CHARSET', 'utf8mb4');

// Основная функция подключения
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Ошибка подключения к локальной базе данных: " . $e->getMessage());
    }
}

// --- ФУНКЦИИ СОВМЕСТИМОСТИ ---
// Чтобы не ломать код в bestiary.php и get_bg.php, 
// просто возвращаем то же самое подключение к локальной базе.

function getSecondDBConnection() {
    return getDBConnection();
}

function getImageDBConnection() {
    return getDBConnection();
}
?>