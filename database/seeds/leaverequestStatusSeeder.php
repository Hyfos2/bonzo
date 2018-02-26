<?php

use Illuminate\Database\Seeder;
use App\leaveRequestStatus;

class leaverequestStatusSeeder extends Seeder
{
    
    public function run()
    {
      
    leaveRequestStatus::create(['id' => 1,'status' => 'New']);
    leaveRequestStatus::create(['id' => 2,'status' => 'Accepted']);
    leaveRequestStatus::create(['id' => 3,'status' => 'Rejected']);
    }
}
