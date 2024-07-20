@extends(backpack_view('blank'))
<div class="row">
    @php
        $widgets['before_content'] = [
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-info mb-2',
                'value'       => 'Cữ bú trong ngày - tổng số ml',
                'description' => sprintf('%s cữ - %s ml', $totalEats, $totalAmount),
                'progress'    => $totalEats / $standardEat * 100, // integer
                'hint'        => $eatMessage,
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2',
                'value'       => 'Tổng thời gian ngủ',
                'description' => sprintf('%s hours', $totalSleepHours),
                'progress'    => $totalSleepHours / $standardSleepHours * 100, // integer
                'hint'        => $sleepMessage,
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-warning mb-2',
                'value'       => 'Cân nặng',
                'description' => '6kg',
                'progress'    => 100, // integer
                'hint'        => 'Đã đạt tiêu chuẩn',
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-primary mb-2',
                'value'       => 'Chiều cao',
                'description' => '60cm',
                'progress'    => 100, // integer
                'hint'        => 'Đã đạt tiêu chuẩn',
            ],
        ];
    @endphp
</div>
@section('content')

@endsection
