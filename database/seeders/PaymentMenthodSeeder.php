<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMenthodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $paymentMenthod = new PaymentMethod();
       $paymentMenthod->name = "Viettel Pay";
       $paymentMenthod->code = "Viettel Pay";
       $paymentMenthod->save();

        $paymentMenthod = new PaymentMethod();
        $paymentMenthod->name = "Bank Plus";
        $paymentMenthod->code = "Bank Plus";
        $paymentMenthod->save();

        $paymentMenthod = new PaymentMethod();
        $paymentMenthod->name = "Trả sau";
        $paymentMenthod->code = "Trả sau";
        $paymentMenthod->save();

        $paymentMenthod = new PaymentMethod();
        $paymentMenthod->name = "QR code";
        $paymentMenthod->code = "QR code";
        $paymentMenthod->save();

        $paymentMenthod = new PaymentMethod();
        $paymentMenthod->name = "Tài khoản của TTKT";
        $paymentMenthod->code = "Tài khoản của TTKT";
        $paymentMenthod->save();

        $paymentMenthod = new PaymentMethod();
        $paymentMenthod->name = "Nộp trực tiếp";
        $paymentMenthod->code = "Nộp trực tiếp";
        $paymentMenthod->save();

    }
}
