<?php
declare(strict_types=1);
trait AppTrait {
  public static string $login1 = 'Mishka';
  public static string $password1 = '12345';

  public static function authenticate(): void
  {
      echo 'Пользователь приложения:' . PHP_EOL;
      echo 'Логин: ' . self::$login1 . PHP_EOL;
      echo 'Пароль: ' . self::$password1 . PHP_EOL;
  }
}

trait MobileTrait {
  public static string $login2 = 'Dima';
  public static string $password2 = '54321';

  public static function authenticate(): void
  {
    echo 'Пользователь мобильного приложения:' . PHP_EOL;
    echo 'Логин: ' . self::$login2 . PHP_EOL;
    echo 'Пароль: ' . self::$password2 . PHP_EOL;
  }
}

class User
{
  use AppTrait, MobileTrait {
    AppTrait::authenticate insteadof MobileTrait;
    AppTrait::authenticate as appAuth;
    MobileTrait::authenticate as mobileAuth;
  }

  private string $login;
  private string $password;

  public function __construct(string $login, string $password)
  {
    $this->login = $login;
    $this->password = $password;
  }
  public function print(): void
  {
    if ($this->login === AppTrait::$login1 && $this->password === AppTrait::$password1) {
      self::appAuth();
    } elseif ($this->login === MobileTrait::$login2 && $this->password === MobileTrait::$password2) {
      self::mobileAuth();
    } else {
      echo 'Такого пользователя не существует';
    }
  }
}

$user = new User('Mishka', '12345');
$user->print();