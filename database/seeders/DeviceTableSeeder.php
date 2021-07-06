<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $devices = [
        // add device here
            array(
                'device_name' => 'Device 1',
                'sn' => 'B200E015336',
                'vc' => '95B4752CDA81802',
                'ac' => 'MNJD097C2DF1768E485D8WFQ',
                'vkey' => 'D2D91E2DB68444435430407E01498683',
            )
        ];

    foreach ($devices as $device) {
            DB::table('devices')->insert($device);
        }
    }
}
