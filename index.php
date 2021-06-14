<?php
declare(strict_types=1);
use AppUser\AppUser;
use MobileUser\MobileUser;
function autoload(string $className): void
{
  $filename = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($filename)) {
    require_once($filename);
  }
}

spl_autoload_register('autoload');

$mobileUser = new MobileUser();
$appUser = new AppUser();

$mobileUser::authenticate('Dima','54321');
$appUser::authenticate('Mishka', '12345');