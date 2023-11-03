@extends('admin/layouts.master_admin')
@section('title', 'Category Added')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">จัดการหมวดหมู่ /</span> แก้ไขหมวดหมู่</h4>
        <a href="{{ route('admin.category.index') }}" class="btn btn-success col-2">แสดงหมวดหมู่</a>

        <div class="card mt-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4>เกิดข้อผิดพลาด</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <div>
                    <form action="/admin/category/update/{{ $category->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}"
                            placeholder="กรอก หมวดหมู่" aria-describedby="defaultFormControlHelp" />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div id="defaultFormControlHelp" class="form-text">
                            <button type="submit" name="submit  Submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
