<?php

namespace Bookstore\Domain\Customer;
use Bookstore\Domain\Customer;

class CustomerFactory {
    public static function factory(
        string $type,
        int $id,
        string $firstname,
        string $surname,
        string $email
        ): Customer {
            switch ($type) {
                case 'basic':
                    return new Basic($id, $firstname, $surname, $email);
                case 'premium':
                    return new Premium($id, $firstname, $surname, $email);
                
        }
    }

}

public static function factory (
    string $type,
    int $id,
    string $firstname,
    string $surname,
    string $email
): Customer {
    $classname = __NAMESPACE__ . '\\' . ucfirst($type);
    if (!class_exists($classname)) {
        throw new \InvalididArgumentException('Wrong type.');
    }
    return new $classname($id, $firstname, $surname, $email);
}

CustomerFactory::factory('basic', 2, 'mary', 'poppins', 'mary@poppins.com');
CustomerFactory::factory('premium', null, 'james', 'bond', 'james@bond.com');




?>
