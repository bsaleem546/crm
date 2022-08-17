<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <20; $i++){
            Ticket::create([
                'name' => 'NAME-'.$i,
                'email' => 'EMAIL-'.$i,
                'subject' => 'SUBJECT-'.$i,
                'department' => 'DATE-'.$i,
                'service' => 'SER-'.$i,
                'priority' => 'low',
                'message' => 'random message',
                'status' => 'pending',
            ]);
        }
    }
}
