<?php

namespace App\Enums;

enum FormTypeCategory: string
{
    case REPORT = 'REPORT';
    case NOTICE = 'NOTICE';
    case STATEMENT = 'STATEMENT';
    case OTHER = 'OTHER';
}
