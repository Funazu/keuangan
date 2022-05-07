<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Collection;

class testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $masuk = DB::table('keuangans')->get('masuk');
        // $keluar = DB::table('keuangans')->get('keluar');
        // $totalsaldo = $masuk - $keluar;
        // $uangmasuk = $masuk;
        // $uangkeluar = $keluar;
        // print_r($totalsaldo);

        // $masuk = DB::table('keuangans')->sum('masuk');
        // $keluar = DB::table('keuangans')->sum('keluar');
        // $totalsaldo = $masuk - $keluar;
        // $uangmasuk = $masuk;
        // $uangkeluar = $keluar;

        // print_r($totalsaldo);
        
    }
}
