<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SuperAdmin = 'super_admin';
    case HRD = 'hrd';
    case Keuangan = 'keuangan';
    case Operasional = 'operasional';
    case Pelamar = 'pelamar';
    case Guard = 'guard';
}
