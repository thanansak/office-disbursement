@extends('adminlte::page')
@php $pagename = 'แก้ไขข้อมูลสมาชิก'; @endphp
@section('content')
    <div class="pt-3">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent;">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}" class="{{ env('TEXT_THEME') }}"><i
                                class="fa fa-home fa-fw" aria-hidden="true"></i> หน้าแรก</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('member.index') }}"
                            class="{{ env('TEXT_THEME') }}">จัดการข้อมูลสมาชิก</a></li>
                    <li class="breadcrumb-item active">{{ $pagename }}</li>
                </ol>
            </nav>
        </div>

        <form action="{{ route('member.update', ['member' => $member->id]) }}" method="post" enctype="multipart/form-data"
            id="form">
            @method('PUT')
            @csrf
            <div class="card {{ env('CARD_THEME') }} card-outline">
                <div class="card-header" style="font-size: 20px;">
                    {{ $pagename }} &nbsp; <a class="btn btn-outline-danger" id="disable_user"> <i
                            class="fas fa-trash mr-2"></i>ลบข้อมูลสมาชิก</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="quote-danger text-md" style="margin: 0 !important;">
                                                รูปโปรไฟล์
                                            </blockquote>
                                            <div class="text-center mt-3">
                                                <img class="rounded-circle" id="showimg"
                                                    src="@if ($member->getFirstMediaUrl('user')) {{ $member->getFirstMediaUrl('user') }} @else https://placehold.co/300x300 @endif"
                                                    width="150" height="150"
                                                    style="width: 150px; height: 150px; max-width: 100%; max-height: 100%; object-fit:cover;">
                                            </div>
                                            <div class="custom-file mb-3 mt-3">
                                                <div class="input-group">
                                                    <input name="img" type="file" class="custom-file-input"
                                                        id="imgInp">
                                                    <label class="custom-file-label" for="imgInp">เพิ่มรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <blockquote class="quote-danger text-md" style="margin: 0 !important;">
                                                ข้อมูลการเข้าสู่ระบบ
                                            </blockquote>
                                            <div class="form-group mt-3">
                                                <label for="exampleInputEmail1">อีเมล</label>
                                                <input type="email" class="form-control form-control-sm" id="email"
                                                    name="email" value="{{ $member->email }}" required>
                                                @error('email')
                                                    <div class="my-2">
                                                        <span class="{{ env('TEXT_THEME') }} my-2">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>ชื่อผู้ใช้</label>
                                                <input type="text" class="form-control form-control-sm" id="username"
                                                    name="username" value="{{ $member->username }}" autocomplete="username"
                                                    required>
                                                @error('username')
                                                    <div class="my-2">
                                                        <span class="{{ env('TEXT_THEME') }} my-2">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">รหัสผ่าน</label>
                                                <input type="password" class="form-control form-control-sm" id="password"
                                                    name="password" minlength="6" value=""
                                                    autocomplete="new-spassword">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">ยืนยันรหัสผ่าน</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    id="confirmpassword" name="confirmpassword" minlength="6"
                                                    value="" autocomplete="new-spassword">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <blockquote class="quote-danger text-md" style="margin: 0 !important;">
                                        ข้อมูลทั่วไป
                                    </blockquote>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-sm-6">
                                            <label>ชิ่อจริง</label>
                                            <input type="text" class="form-control form-control-sm" id="firstname"
                                                name="firstname" value="{{ $member->firstname }}" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="inputPassword4">นามสกุล</label>
                                            <input type="text" class="form-control form-control-sm" id="lastname"
                                                name="lastname" value="{{ $member->lastname }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>เบอร์โทรศัพท์</label>
                                                <input type="text" class="form-control form-control-sm inputmask-phone"
                                                    id="phone" name="phone" value="{{ $member->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>ไอดีไลน์</label>
                                                <input type="text" class="form-control form-control-sm" id="line_id"
                                                    name="line_id" value="{{ $member->line_id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <blockquote class="quote-danger text-md" style="margin: 0 !important;">
                                        ข้อมูลที่อยู่
                                    </blockquote>

                                    <div class="mt-3 mb-3">
                                        <label class="form-label">ที่อยู่</label>
                                        <textarea name="address" id="" rows="5" class="form-control">{{ $member->address->address }}</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">จังหวัด</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="province" id="province"
                                                    value="{{ $member->address->province }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">อำเภอ</label>
                                                <input type="text" class="form-control form-control-sm" name="amphoe"
                                                    id="amphoe" value="{{ $member->address->amphoe }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">ตำบล</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="district" id="district"
                                                    value="{{ $member->address->district }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">ไปรษณีย์</label>
                                                <input type="text" class="form-control form-control-sm" name="zipcode"
                                                    id="zipcode" value="{{ $member->address->zipcode }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <a class='btn btn-secondary' onclick='history.back();'><i
                                class="fas fa-arrow-left mr-2"></i>ย้อนกลับ</a>
                        <a class='btn {{ env('BTN_THEME') }}' onclick="submitData()"><i
                                class="fas fa-save mr-2"></i>บันทึก</a>
                    </div>
                </div>
            </div>
        </form>


    </div>

@section('plugins.Thailand', true)
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@11'])
@push('js')
    <script>
        function submitData() {
            Swal.fire({
                title: 'ยืนยันที่จะบันทึกหรือไม่',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form').submit();
                }
            })
        }
        $(document).ready(function() {
            $.Thailand({
                database: `{{ asset('plugins/jquery.Thailand.js/database/db.json') }}`,
                $district: $('#district'), // input ของตำบล
                $amphoe: $('#amphoe'), // input ของอำเภอ
                $province: $('#province'), // input ของจังหวัด
                $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
            });
        });

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                showimg.src = URL.createObjectURL(file)
            }
        }

        function confirmpass() {
            var pw1 = document.forms['formsubmit']['password'].value;
            var pw2 = document.forms['formsubmit']['confirmpassword'].value;

            if (pw1 != pw2) {
                Swal.fire({
                    icon: 'error',
                    title: 'ผิดพลาด',
                    text: 'รหัสผ่านไม่ตรงกัน',
                });
                return false;
            } else {
                return true;
            }
        }

        $('#disable_user').on('click', function() {
            Swal.fire({
                title: 'ต้องการลบใช่หรือไม่',
                text: 'หากลบข้อมูล ข้อมูลจะถูกย้ายไปอยู่ที่หน้าประวัติสมาชิก',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    member_id = '{{ $member->id }}'
                    url = '{{ route('member.publish', ['id' => ':id']) }}';
                    url = url.replace(':id', member_id);
                    $.ajax({
                        type: 'GET',
                        url: url,
                        dataType: 'JSON',
                        success: function(response) {
                            if (response.status === true) {
                                Swal.fire({
                                    title: response.msg,
                                    icon: 'success',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 2000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                }).then(function() {
                                    window.location.href =
                                        "{{ route('member.index') }}";
                                });
                            } else {
                                Swal.fire({
                                    title: response.msg,
                                    icon: 'error',
                                    toast: true,
                                    position: 'top-right',
                                    timer: 2000,
                                    showCancelButton: false,
                                    showConfirmButton: false
                                });
                            }
                        }
                    });

                }
            });
        })
    </script>
@endpush
@endsection
