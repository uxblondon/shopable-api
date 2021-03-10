<?php

use App\Models\ShippingDestination;
use App\Models\ShippingRate;
use Illuminate\Database\Seeder;

class ShippingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destinations = array(
            'Collection',
            'UK',
            'EU',
            'Worldwide',
        );

        foreach ($destinations as $destination) {
            $destination_data = array(
                'title' => $destination,
                'active' => 1,
                'created_by' => 1
            );

            $shipping_destination = ShippingDestination::create($destination_data);

            $ranges = array(
                ['from' => 0, 'to' => 100, 'rate' => 0.66],
                ['from' => 101, 'to' => 750, 'rate' => 0.96],
                ['from' => 751, 'to' => 2000, 'rate' => 3],
                ['from' => 2001, 'to' => 20000, 'rate' => 5.1],
                ['from' => 20001, 'to' => 30000, 'rate' => 12.12],
            );

            foreach ($ranges as $range) {
                $shipping_rate_data = array(
                    'shipping_destination_id' => $shipping_destination->id,
                    'weight_from' => $range['from'],
                    'weight_upto' => $range['to'],
                    'rate' => $range['rate'],
                    'active' => 1,
                    'created_by' => 1
                );

                ShippingRate::create($shipping_rate_data);
            }
        }
    }
}
