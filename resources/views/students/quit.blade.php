@extends('app')

@section('title', 'LHU 休學學生')

@section('lhu_contents')
        <table class="flex-center position-ref">
            <tr>
                <th>姓名</th>
                <th>電子郵件信箱</th>
                <th>到職日</th>
                <th>狀態</th>
            </tr>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                <td>{{ Carbon\Carbon::parse($student->born_at)->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('students.restore', ['id' => $student->id])  }}">復學</a></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">目前沒有老師</td>
            </tr>
        @endforelse
        </table>
@stop
