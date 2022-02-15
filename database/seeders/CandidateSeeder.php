<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('candidates')->insert(array(
            [
                'name' => 'sniren',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'fakultas' =>
                'teknik infomatika',
                'image' => 'default.png'
            ],
            [
                'name' => 'amel',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'fakultas' =>
                'teknik informasi',
                'image' => 'default.png'
            ],
            [
                'name' => 'layla',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'fakultas' => 'bahasa inggirs',
                'image' => 'default.png'
            ],
        ));
    }
}
