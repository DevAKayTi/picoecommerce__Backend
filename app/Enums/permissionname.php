<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class permissionname extends Enum
{
    public static function getPermissionName($label):Array {
        foreach($label as $l){
            switch ($l){
                case "UserCreate":
                    return self::1;
                case "UserUpdate":
                    return self::2;
                case "UserView":
                    return self::3;
                case "UserDelete":
                    return self::4;
                default: return "";
            }
        }
    }
}
