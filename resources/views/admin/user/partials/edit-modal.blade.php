<form id="form">
    <div class="modal fade" id="modal-edit" data-backdrop="static" data-keyboard="false"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">แก้ไขข้อมูล</h5>
                    <div class="ml-3" id="btnDel"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="eid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <div class="mb-3 text-center">
                                    <label class="form-label">รูปโปรไฟล์</label><br />
                                    <img src="https://placehold.co/300x300" id="eshowimg" width="150" height="150"
                                        style="max-width: 100%; object-fit: cover;"> <br />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="eimg" name="eimg"
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
                                        <label class="form-label">ชื่อ (ภาษาไทย)</label>
                                        <input class="form-control form-control-sm" name="efirstname" id="efirstname" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล (ภาษาไทย)</label>
                                        <input class="form-control form-control-sm" name="elastname" id="elastname" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control form-control-sm inputmask-phone"
                                            name="ephone" id="ephone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Line ID</label>
                                        <input type="text" class="form-control form-control-sm" name="eline_id"
                                            id="eline_id">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">บทบาท</label>
                                        <select class="sel2 form-control" name="erole" id="erole"
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
                                <input type="email" class="form-control form-control-sm" name="eemail"
                                    id="eemail" />
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="username" class="form-control form-control-sm" name="eusername"
                                            id="eusername" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="username" class="form-control form-control-sm" name="epassword"
                                            id="epassword" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn {{ env('BTN_THEME') }}" onclick="updateData()">บันทึก</a>
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
