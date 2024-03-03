{{-- Krajee --}}
{{-- @php
    $config = [
        'browseOnZoneClick' => true,
        'overwriteInitial' => true,
        'theme' => 'fa5',
        'language' => 'th',
        'showUpload' => false,
        'allowedFileExtensions' => ["jpg", "jpeg", "gif", "png"],
    ];
@endphp --}}

<form id="form">
    <div class="modal fade" id="modal-create" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เพิ่มข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <div class="mb-3 text-center">
                                    <label class="form-label">รูปโปรไฟล์</label><br />
                                    <img src="https://placehold.co/300x300" id="showimg" width="150" height="150"
                                        style="max-width: 100%; object-fit: cover;"> <br />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img"
                                            onchange="return fileValidation(this)" accept="image/*">
                                        <label class="custom-file-label">เลือกไฟล์</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ</label>
                                        <input class="form-control form-control-sm" name="firstname" id="firstname" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล</label>
                                        <input class="form-control form-control-sm" name="lastname" id="lastname" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control form-control-sm inputmask-phone"
                                            name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Line ID</label>
                                        <input type="text" class="form-control form-control-sm" name="line_id"
                                            id="line_id">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">บทบาท</label>
                                        <select class="sel2 form-control" name="role" id="role"
                                            style="width: 100%;">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="mb-3">
                                <label class="form-label">อีเมล</label>

                                <input type="email" class="form-control form-control-sm" name="email" id="email"
                                    onchange="checkEmail()" />
                                <div id="email-valid-feedback"></div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="username" class="form-control form-control-sm" name="username"
                                            id="username" onchange="checkUsername()" />
                                        <div id="username-valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="username" class="form-control form-control-sm" name="password"
                                            id="password" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="reset" class="btn btn-danger btnReset">ล้างข้อมูล</button>
                    <a class="btn {{ env('BTN_THEME') }}" onclick="storeData()">บันทึก</a>
                </div>
            </div>
        </div>
    </div>
</form>


@push('js')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
