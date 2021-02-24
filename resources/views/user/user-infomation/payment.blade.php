@extends('dashboard')
@section('content')
    <style>
         div {
            margin: auto;
        }
         .btn-payment {
            margin: auto;
             background-color: #007f49;
             border: none;
             color: #FFFFFF;
             border-radius: 50px;
             padding: 12px 48px;
             cursor: pointer;
             transition: opacity 0.2s ease;
         }
         .btn-payment + .btn-payment {
             margin-left: 16px;
             margin-top: 12px;
         }
         .btn-payment:hover {
             opacity: 0.8;
         }

    </style>
    <div>
        <h2>Chọn phương thức thanh toán</h2>
        <form action="{{ route('student.payment.store') }}" method="post">
            @csrf
            <div>
                @foreach($paymentMenthods as $paymentMenthod)
                    <button class="btn-payment" type="submit" value="{{ $paymentMenthod->name }}"name="{{ $paymentMenthod->name }}">
                        {{ $paymentMenthod->name }}
                    </button>
            @endforeach
            </div>

        </form>
    </div>
@endsection
