@extends(backpack_view('blank'))
<div class="row">
    @php
        $widgets['before_content'] = [
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-info mb-2',
                'value'       => 'Cữ bú',
                'description' => '5',
                'progress'    => 57, // integer
                'hint'        => '3 cữ bú nữa mới đủ tiêu chuẩn ngày',
            ],
            [
                'type'        => 'progress',
                'class'       => 'card text-white bg-success mb-2',
                'value'       => 'Tổng thời gian ngủ',
                'description' => '10h',
                'progress'    => 57, // integer
                'hint'        => 'Cần ngủ thêm 6h nữa',
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
