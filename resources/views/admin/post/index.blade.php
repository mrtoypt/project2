@extends('admin/layouts.master_admin')
@section('title', 'Post')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">จัดการข่าว /</span> แสดงข่าว</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success col-2">สร้างข่าว</a>

        <div class="card mt-2">
            @if (session()->has('success'))
                <div class="alert alert-success m-2">{{ session()->get('success') }}</div>
            @endif
            <div class="table-responsive text-nowrap ">
                <table class="table table-hover ">
                    <thead>
                        <tr class='table-primary'>
                            <th>ชื่อข่าว</th>
                            <th>ชื่อข่าว</th>
                            <th>category</th>
                            <th>ชื่อข่าว</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                       @php($i = $Posts->firstItem())
                        @foreach ($Posts as $post)
                            <tr>
                                <td>{{ $i }}</td>

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $post->title }}</strong>
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $post->category->name }}</strong>
                                </td>
                                <td><img src='/uploads/{{ $post->thumbnail }}' width="100"/></td>
                                <td>
                                    <a href="/admin/post/edit/{{ $post->id }}" class="btn btn-warning">แก้ไข</a>
                                    <a href="/admin/post/delete/{{ $post->id }} " class="btn btn-danger"
                                        onclick="return confirm('คุณต้องการลบข่าวนี้ใช่หรือไม่?')">ลบ
                                    </a>
                                </td>
                            </tr>
                            @php($i++)
                        @endforeach
                    </tbody>
                </table>
                {{ $Posts->links() }}
            </div>
        </div>

    </div>


@endsection
