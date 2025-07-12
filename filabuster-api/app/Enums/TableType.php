<?php

namespace App\Enums;

enum TableType: string {
    case LOOKUP = 'lookup';
    case ENTITY = 'entity';
    case PIVOT = 'pivot';
}
