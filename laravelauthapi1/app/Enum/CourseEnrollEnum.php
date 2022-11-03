<?php

namespace App\Enum;

enum CourseEnrollEnum:string{
    case ACTIVE = 'enrolled';
    case INACTIVE = 'not enrolled';
    case SUSPENDED = 'disabled';
}