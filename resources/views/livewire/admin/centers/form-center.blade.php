<div class="row">
    <div class="col-xs-12">
        <div class="col-lg-12">
            <div class="card-box">
                <h2 class="card-title"><b>{{ $titlePage }}</b></h2>

                @if(session()->has('name_error'))

                        <div class="alert alert-danger"> {{ session('name_error') }} </div>

                    @endif

                @if($errors->any())

                    <div class="alert alert-danger">

                        @foreach($errors->all() as $e)
                            {{ $e }}<br>
                        @endforeach

                    </div>

                @endif

                <form action="{{ $type == 'edit'? route('centers.update' , $center_id) : route('centers.store') }}" class="form-horizontal"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام مرکز</label>
                        <div class="col-md-10">
                            <input required id="name" type="text" name="name"
                                   class="form-control rounded"
                                   placeholder="نام مرکز را وارد کنید"
                                   value="{{ $name != null ? $name : old('name') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">نامک (slug)</label>
                            <div class="col-md-10">
                                <input required id="slug" type="text" name="slug"
                                       class="form-control rounded"
                                       placeholder="نامک (slug) را وارد کنید"
                                       value="{{ $slug != null ? $slug : old('slug') }}">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">دسته بندی</label>
                        <div class="col-md-10">

                            <select required class="form-control rounded" name="category_id">

                                @foreach($cats as $s)

                                    <option {{ $type == 'edit' && $s->id == $center->category_id ? 'selected' : old('category_id') }} value="{{ $s->id }}"> {{ $s->title }} </option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">استان</label>
                            <div class="col-md-10">

                                <select wire:model="state_id" required class="form-control rounded" name="state_id">

                                    <option value="">بدون استان</option>

                                    @foreach($states as $s)

                                        <option {{ $type == 'edit' && $s->id == $center->state_id ? 'selected' : old('state_id') }} value="{{ $s->id }}"> {{ $s->name }} </option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">شهر</label>
                            <div class="col-md-10">

                                <select wire:model="city_id" required class="form-control rounded" name="city_id">

                                    @foreach($cities as $s)

                                        <option {{ $type == 'edit' && $s->id == $center->city_id ? 'selected' : old('city_id') }} value="{{ $s->id }}"> {{ $s->name }} </option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">توضیحات</label>
                            <div class="col-md-10">
                                <textarea required rows="5" type="text" name="description"
                                          class="form-control"
                                          placeholder="توضیحات را وارد کنید">{{ $description != null ? $description : old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">تعداد صندلی ها در هر میز</label>
                            <div class="col-md-10">
                                <input required id="slug" type="text" name="chairs_people_count"
                                       class="form-control rounded"
                                       placeholder="تعداد صندلی ها در هر میز را وارد کنید"
                                       value="{{ $chairs_people_count != null ? $chairs_people_count : old('chairs_people_count') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">عکس مرکز</label>
                            <div class="col-md-10">
                                <input {{ $type == '' ? 'required'  :  '' }} id="name" type="file" name="images"
                                       class="form-control rounded"
                                       placeholder="عکس مرکز را وارد کنید"
                                       value="{{ old('images') }}">

                                @if($type == 'edit')
                                    <div class="row">
                                        <br>
                                        @foreach( $center->images['images'] as $key => $image)
                                            <div class="col-sm-2 col-xs-10 "
                                                 style="border-radius: 20px;box-shadow: 5px 10px 18px rgba(32,32,32,0.55); margin-right: 30px ; margin-top: 30px">
                                                <label class="control-label">
                                                    {{ $key }}
                                                    <input required type="radio" name="imagesThumb"
                                                           value="{{ $image }}" {{ $center->images['thumb'] == $image ? 'checked' : '' }} />
                                                    <a href="{{ $image }}" target="_blank"><img
                                                            style="border-radius: 20px; margin-bottom: 8px;"
                                                            src="{{ $image }}" width="100%"></a>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('cities.index') }}"
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $("#name").on('keyup' , function () {

            data = $("#name").val()
            data = data.replaceAll(' ' , '-')

            $("#slug").val(data)
        });

        $('#slug').on('keyup' , function () {

            data = $("#slug").val()
            data = data.replaceAll(' ' , '-')
            $("#slug").val(data)

        })

    </script>

@endpush
