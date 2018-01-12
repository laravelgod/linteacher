@extends('app')

@section('title', 'LHU 在學學生')

@section('lhu_contents')
        <table class="flex-center position-ref">
            <tr>
                <th>姓名</th>
                <th>電子郵件信箱</th>
                <th>出生日期</th>
                <th>導師</th>
                <th>編輯</th>
                <th>狀態</th>
            </tr>
        @forelse($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
                <td>{{ Carbon\Carbon::parse($student->born_at)->format('Y-m-d') }}</td>
                <td>
                    @if (isset($student->teacher))
                        {{ $student->teacher->name }}
                    @else
                        導師離職
                    @endif
                </td>
                <td>
                    <a href="{{ route('students.edit', ['id' => $student->id])  }}">編輯</a></a>
                </td>
                <td>
                    <a href="{{ route('students.destroy', ['id' => $student->id])  }}">休學</a></a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">目前沒有學生</td>
            </tr>
        @endforelse
        </table>
@stop
