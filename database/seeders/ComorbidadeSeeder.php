<?php

namespace Database\Seeders;

use App\Models\Comorbidade;
use Illuminate\Database\Seeder;

class ComorbidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comorbidade::firstOrCreate(['nome' => 'Diabetes']);
        Comorbidade::firstOrCreate(['nome' => 'Diabetes mellitus']);
        Comorbidade::firstOrCreate(['nome' => 'Pneumopatia crônica grave']);
        Comorbidade::firstOrCreate(['nome' => 'Doença cerebrovascular']);
        Comorbidade::firstOrCreate(['nome' => 'Doença renal crônica']);
        Comorbidade::firstOrCreate(['nome' => 'Imunossuprimido']);
        Comorbidade::firstOrCreate(['nome' => 'Hemoglobinopatia grave']);
        Comorbidade::firstOrCreate(['nome' => 'Obesidade mórbida']);
        Comorbidade::firstOrCreate(['nome' => 'Síndrome de Down']);
        Comorbidade::firstOrCreate(['nome' => 'Cirrose hepática']);
        Comorbidade::firstOrCreate(['nome' => 'Hipertensão Arterial Resistente (HAR)']);
        Comorbidade::firstOrCreate(['nome' => 'Hipertensão arterial estágio 3']);
        Comorbidade::firstOrCreate(['nome' => 'Hipertensão arterial estágios 1 ou 2 com lesão em órgão-alvo']);
        Comorbidade::firstOrCreate(['nome' => 'Insuficiência cardíaca (IC)']);
        Comorbidade::firstOrCreate(['nome' => 'Cor-pulmonaleHipertensão pulmonar']);
        Comorbidade::firstOrCreate(['nome' => 'Cardiopatia hipertensiva']);
        Comorbidade::firstOrCreate(['nome' => 'Síndrome coronariana']);
        Comorbidade::firstOrCreate(['nome' => 'Valvopatia']);
        Comorbidade::firstOrCreate(['nome' => 'Miocardiopatias']);
        Comorbidade::firstOrCreate(['nome' => 'Pericardiopatias']);
        Comorbidade::firstOrCreate(['nome' => 'Doença da Aorta']);
        Comorbidade::firstOrCreate(['nome' => 'Doença dos Grandes Vasos']);
        Comorbidade::firstOrCreate(['nome' => 'Fístula arteriovenosa']);
        Comorbidade::firstOrCreate(['nome' => 'Arritmia cardíaca']);
        Comorbidade::firstOrCreate(['nome' => 'Cardiopatia congênita']);
        Comorbidade::firstOrCreate(['nome' => 'Prótese valvares']);
        Comorbidade::firstOrCreate(['nome' => 'Dispositivo cardíaco implantado']);
        Comorbidade::firstOrCreate(['nome' => 'Doença neurológica crônica']);
    }
}
