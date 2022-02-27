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
                'jenis' => 'BEM',
                'image' => 'default.png'
            ],
            [
                'name' => 'amel',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'DPM',
                'image' => 'default.png'
            ],
            [
                'name' => 'layla',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'HIMA',
                'image' => 'default.png'
            ],
            [
                'name' => 'hide',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'HIMAKU',
                'image' => 'default.png'
            ],
            [
                'name' => 'snirenx',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'BEM',
                'image' => 'default.png'
            ],
            [
                'name' => 'amelx',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'DPM',
                'image' => 'default.png'
            ],
            [
                'name' => 'laylax',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'HIMA',
                'image' => 'default.png'
            ],
            [
                'name' => 'hidex',
                'visi' => '1.membuat blabalbal,2.membuat blablbalbal',
                'misi' => 'Id culpa nostrud ipsum reprehenderit fugiat sint sunt. Occaecat non veniam deserunt exercitation non non officia elit aute. Dolor anim cupidatat et exercitation non officia magna. Tempor laborum dolor sunt sunt. Irure velit quis dolor proident et laborum voluptate sint nostrud id. Anim enim id mollit ut ex. Veniam duis amet dolore enim nostrud.',
                'jenis' => 'HIMAKU',
                'image' => 'default.png'
            ],
        ));
    }
}
