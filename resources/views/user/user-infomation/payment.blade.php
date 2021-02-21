@extends('dashboard')
@section('content')
    <div>
        <h2>Chọn phương thức thanh toán</h2>
        <form action="{{ route('student.payment.store') }}" method="post">
            @csrf
            <ul>
                <li>
                    @foreach($paymentMenthods as $paymentMenthod)
                        <button class="btn btn-primary btn-lg activ" type="submit" value="Viettel Pay"name="paymethod">
                            {{ $paymentMenthod->name }}
                        </button>
                    @endforeach
                </li>
            </ul>
        </form>
    </div>
@endsection
