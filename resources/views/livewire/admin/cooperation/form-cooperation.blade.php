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
                      action="{{ $type == 'edit' ? route('cooperations.update' , $cooperation_id) :  route('cooperations.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام</label>
                        <div class="col-md-10">
                            <input wire:model.defer="name" required id="title" type="text" name="name"
                                   class="form-control rounded"
                                   placeholder="نام را وارد کنید" value="{{ $name != null? $name : old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام خانوادگی</label>
                        <div class="col-md-10">
                            <input wire:model.defer="family" required id="title" type="text" name="family"
                                   class="form-control rounded"
                                   placeholder="نام خانوادگی را وارد کنید"
                                   value="{{ $family != null? $family : old('family') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">شماره تلفن</label>
                        <div class="col-md-10">
                            <input wire:model.defer="phone" required id="title" type="text" name="phone"
                                   class="form-control rounded"
                                   placeholder="شماره تلفن را وارد کنید" value="{{ $phone != null? $phone : old('phone') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">توضیحات</label>
                        <div wire:model.defer="text" class="col-md-10">
                              <textarea required rows="8" type="text" name="description" id="body"
                                        class="form-control"
                                        placeholder="توضیحات را وارد کنید">{{ $description != null ? $description : old('description') }}</textarea>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">آدرس ( کامل همراه با نام )</label>
                            <div wire:model.defer="text" class="col-md-10">
                              <textarea required rows="8" type="text" name="address" id="body"
                                        class="form-control"
                                        placeholder="آدرس را وارد کنید">{{ $address != null ? $address : old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">فایل ضمیمه (اختیاری)</label>
                            <div class="col-sm-10">

                                <input type="file" name="file"
                                       class="form-control rounded"
                                       placeholder="فایل ضمیمه را وارد کنید"
                                       value="{{ old('file') }}">
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('contact_us.index') }}"
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
