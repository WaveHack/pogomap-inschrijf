<?php

namespace App\Console\Commands;

use Cache;
use DB;
use Illuminate\Console\Command;
use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

class CacheRMData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cachermdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Caches RocketMap data';

    /**
     * @var Connection
     */
    protected $db;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->db = DB::connection('rocketmap');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->cachePokemon();
        $this->cacheCyms();
        $this->cacheLuredPokestops();

        return true;
    }

    protected function cachePokemon()
    {
        // todo
    }

    protected function cacheCyms()
    {
        $teams = [
            1 => 'mystic',
            2 => 'valor',
            3 => 'instinct',
        ];

        /** @var Collection $gyms */
        $gyms = $this->db->table('gym')
            ->get();

        Cache::put('gyms.total', $gyms->count(), 60);

        $gymsByTeam = [
            1 => 0,
            2 => 0,
            3 => 0,
        ];

        $gyms->each(function ($item, $key) use (&$gymsByTeam) {
            $gymsByTeam[$item->team_id]++;
        });

        foreach ($teams as $teamId => $team) {
            Cache::put("gyms.{$team}", $gymsByTeam[$teamId], 5);
        }
    }

    protected function cacheLuredPokestops()
    {
        // todo
    }
}
