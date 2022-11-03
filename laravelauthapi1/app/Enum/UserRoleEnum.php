<?php

namespace App\Enum;

enum UserRoleEnum:string{
    case STUDENT = 'student';
    case INSTRUCTOR = 'instructor';
}