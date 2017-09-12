<?php

use Illuminate\Database\Seeder;

class BlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // A big thing that adds all the blocks. use json shortcuts
        $json = File::get("database/blocks.json");
        $data = json_decode($json);
        // things
        // find schedule ID based on $day (reverse array lookup) date('N', strtotime('Monday'));
        //
        foreach ($data as $dotw => $blocks) { // each day
            $schedule_id = date('N', strtotime($dotw));
            foreach ($blocks as $block) { // each block
                factory(App\Block::class)->create([
                    "number" => ($block->number ?? null),
                    "name" => ($block->name ?? null),
                    "start_time" => date('H:i:s',strtotime($block->start)),
                    "end_time" => date('H:i:s',strtotime($block->end)),
                    "schedule_id" => $schedule_id,
                ]);
            }
        }

    }
}
