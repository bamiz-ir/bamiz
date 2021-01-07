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
                      action="{{ $type == 'edit' ? route('contact_us.update' , $contact_us_id) :  route('contact_us.store') }}"
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
                                   placeholder="نام را وارد کنید" value="{{ $name != null? $name : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام خانوادگی</label>
                        <div class="col-md-10">
                            <input wire:model.defer="lastName" required id="title" type="text" name="lastName"
                                   class="form-control rounded"
                                   placeholder="نام خانوادگی را وارد کنید"
                                   value="{{ $lastName != null? $lastName : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">ایمیل</label>
                        <div class="col-md-10">
                            <input wire:model.defer="email" required id="title" type="email" name="email"
                                   class="form-control rounded"
                                   placeholder="ایمیل را وارد کنید" value="{{ $email != null? $email : old('email') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">عنوان</label>
                            <div class="col-md-10">
                                <input wire:model.defer="title" required id="title" type="text" name="title"
                                       class="form-control rounded"
                                       placeholder="عنوان را وارد کنید" value="{{ $email != null? $email : old('title') }}">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">متن</label>
                        <div wire:model.defer="text" class="col-md-10">
                              <textarea required rows="8" type="text" name="text" id="body"
                                        class="form-control"
                                        placeholder="متن را وارد کنید">{{ $text != null ? $text : old('text') }}</textarea>
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
