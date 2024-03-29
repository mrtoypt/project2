@extends('admin/layouts.master_admin')
@section('title', 'Post')
{{-- @section('css')
@endsection --}}
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">จัดการข่าว /</span> แสดงข่าว</h4>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success col-2">สร้างข่าว</a>

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
                    <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">หัวข้อข่าว</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title') }}" placeholder="หัวข้อข่าว">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">หมวดหมู่ข่าว</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">เลือกหมวดหมู่ข่าว</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">รูปภาพประกอบ</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control-file" accept="image/*">
                            @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">เนื้อหาข่าว</label>
                            <textarea name="content" id="summernote" class="form-control" rows="10">{{ old('content') }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 400
        });
    </script>

@endsection
