<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum RolesEnum : string implements HasLabel
{
    case SUPER_ADMIN = 'super_admin';
    case CLIENT = 'client';
    case COURT_OWNER = 'court_owner';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::CLIENT => 'Cliente',
            self::COURT_OWNER => 'Dono de Quadra',
        };
    }

    public static function getLabelTable($state): string
    {
        switch ($state) {
            case 'super_admin':
                return 'Super Admin';
            case 'client':
                return 'Cliente';
            case 'court_owner':
                return 'Dono de Quadra';
            default:
                return 'sem função';
        };
    }
}