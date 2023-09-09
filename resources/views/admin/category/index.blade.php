@extends('admin/layouts.master_admin')
@section('title', 'Category')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">จัดการหมวดหมู่ /</span> แสดงหมวดหมู่</h4>
        <a href="{{ route('admin.category.create') }}" class="btn btn-success col-2">สร้างหมวดหมู่</a>

        <div class="card mt-2">

            <div class="table-responsive text-nowrap ">
                <table class="table table-hover ">
                    <thead>
                        <tr class='table-primary'>
                            <th>ชื่อหมวดหมู่</th>
                            <th>ชื่อหมวดหมู่</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <a href="/admin/category/edit/{{ $category->id }}" class="btn btn-warning">แก้ไข</a>
                                    <a href="/admin/category/destroy/{{ $category->id }} " class="btn btn-danger"
                                            onclick="return confirm('คุณต้องการลบหมวดหมู่นี้ใช่หรือไม่?')">ลบ
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
