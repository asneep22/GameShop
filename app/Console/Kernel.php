<?php

namespace App\Console;

use App\Models\discount;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            //Вычисляем нынешнюю дату
            $date_now = Carbon::now();
            $date_now = strtotime($date_now->format('d.m.Y'));
            $products = Product::all();
            //Перебираем все товары
            foreach ($products as $product) {
                $discount = 0;
                //Перебираем отложенные скидки у товара
                if ($product->discounts->count() > 0) {
                    for ($i = 0; $i < $product->discounts->count(); $i++) {
                        //Вычисляем даты начала и конца скидки
                        $date_in = strtotime($product->discounts->get($i)->date_start);
                        $date_out = strtotime($product->discounts->get($i)->date_end);
                        //Если даты записи скидки находятся в диапазоне date_in и date_out тогда помещаем id скидки в discount_id

                        //Удаляем запись о скидке, если она просрочена
                        if($date_now - $date_out > 0){
                            discount::where('id', $product->discounts->get($i)->id)->delete();
                            continue;
                        }

                        //Запоминаем скидку, если даты скидки находятся в диапазоне
                        if($date_now > $date_in && $date_now < $date_out){
                            $discount = $product->discounts->get($i)->discount;
                        }
                        //Присваиваем товару скидку, которая находится в диапазоне
                    }

                    $product->update(['discount_id' => $discount->id]);

                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
