<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Party;
use App\Candidate;



class InitTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init tables with data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private $parties_data = [
        [
            'name' => 'Parti Ayam',
        ],
        [
            'name' => 'Parti Itik',
        ],
        [
            'name' => 'Parti Kucing',
        ],
    ];

    private $candidates_data = [
        [
            'name' => 'Abu Bakar Muhammad',
            'party_id' => 3,
        ],
        [
            'name' => 'Ng Pei Li',
            'party_id' => 3,
        ],
        [
            'name' => 'Ranjit Singh Deo',
            'party_id' => 3,
        ],
        [
            'name' => 'Foo Yoke Wai ',
            'party_id' => 1,
        ],
        [
            'name' => 'Chia Kim Hooi',
            'party_id' => 2,
        ],
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach($this->party_data as $parties_data) {
            $party = new Party;
            $party->name = $parties_data['name'];
            $party->save();

            echo "Party $party->name created successfully\n";
        }

        foreach($this->candidate_data as $candidates_data) {
            $can = new Candidate;
            $can->name = $candidates_data['name'];
            $can->party_id = $candidates_data['party_id'];
            $can->save();

            echo "Party $can->name created successfully\n";
        }
    }
}
