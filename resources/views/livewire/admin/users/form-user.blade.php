<div class="row">
    <div class="col-xs-12">
        <div class="col-lg-12">
            <div class="card-box">
                <h2 class="card-title"><b>{{ $titlePage }}</b></h2>

                @if($errors->any())

                    <div class="alert alert-danger">

                        @foreach($errors->all() as $e)
                            {{ $e }}<br>
                        @endforeach

                    </div>

                @endif

                <form class="form-horizontal"
                      action="{{ $type == 'edit' ? route('users.update' , $user_id) : route('users.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام</label>
                        <div class="col-md-10">
                            <input  id="title" type="text" name="name"
                                   class="form-control rounded"
                                   placeholder="نام را وارد کنید" value="{{ $name != null? $name : old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام خانوادگی</label>
                        <div class="col-md-10">
                            <input  id="slug" type="text" name="lastName"
                                   class="form-control rounded"
                                   placeholder="نام خانوادگی را وارد کنید"
                                   value="{{ $lastName != null ? $lastName : old('lastName') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام کاربری</label>
                        <div class="col-md-10">
                            <input required type="text" name="username"
                                   class="form-control rounded"
                                   placeholder="نام کاربری را وارد کنید"
                                   value="{{ $username != null ? $username : old('username') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="control-label col-lg-2">رمز عبور</label>
                        <div class="col-md-10">
                            <input {{ $type != 'edit' && "required" }} type="text" name="password"
                                   class="form-control rounded"
                                   placeholder="رمز عبور را وارد کنید"
                                   value="{{old('password') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">تکرار رمز عبور</label>
                            <div class="col-md-10">
                                <input {{ $type != 'edit' && "required" }} type="text" name="rep_password"
                                       class="form-control rounded"
                                       placeholder="تکرار رمز عبور را وارد کنید"
                                       value="{{ old('rep_password') }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-lg-2">ایمیل</label>
                            <div class="col-md-10">
                                <input required type="email" name="email"
                                       class="form-control rounded"
                                       placeholder="ایمیل را وارد کنید"
                                       value="{{ $email != null ? $email : old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">شماره تلفن</label>
                            <div class="col-md-10">
                                <input required type="text" name="phone"
                                       class="form-control rounded"
                                       placeholder="شماره تلفن را وارد کنید"
                                       value="{{ $phone != null ? $phone : old('phone') }}">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نقش</label>
                        <div class="col-md-10">

                            <select  class="form-control rounded" name="level">

                                <option @if($level == 'user') selected @endif value="user">کاربر</option>
                                <option @if($level == 'admin') selected @endif value="admin">مدیر</option>
                                <option @if($level == 'manager') selected @endif value="manager">مدیر رستوران</option>

                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">آیا بلاک است؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="block_status"
                                       class="form-control rounded"
                                       placeholder="وضعیت بلاک را وارد کنید"
                                       value="{{ old('block_status') ?: 1 }}" {{ $block_status ==  1 ? "checked" : ""}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">آیا فعال است؟</label>
                            <div class="col-md-10">
                                <input type="checkbox" name="active"
                                       class="form-control rounded"
                                       placeholder="وضعیت فعال را وارد کنید"
                                       value="{{ old('active') ?: 1 }}" {{ $active == 1 ? "checked" : "" }}>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">عکس</label>
                        <div class="col-sm-10">

                            <input type="file" name="profile_photo_path"
                                   class="form-control rounded"
                                   placeholder="عکس را وارد کنید"
                                   value="{{ old('profile_photo_path') }}">
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('users.index') }}"
                               class="btn btn-danger btn-border-radius waves-effect">
                                بازگشت
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@push("StackScript")



@endpush
