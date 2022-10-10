<?php

namespace App\Enums;

enum UserRole:string
{
  case GeneralManager = 'general_manager';
  case HRManager = 'hr_manager';
  case HRStaff = 'hr_staff';
  case HeadOfDepartment = 'hod';
  case Staff = 'staff';
}