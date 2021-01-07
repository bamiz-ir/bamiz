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
                      action="{{ $type == 'edit' ? route('options.update' , $option_id) :  route('options.store')}}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">عنوان</label>
                        <div class="col-md-10">
                            <input id="title" required type="text" name="title"
                                   class="form-control rounded"
                                   placeholder="عنوان را وارد کنید"
                                   value="{{ $title != null ? $title : old('title') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">نامک (slug)</label>
                            <div class="col-md-10">
                                <input id="slug" required type="text" name="slug"
                                       class="form-control rounded"
                                       placeholder="نامک (slug) را وارد کنید"
                                       value="{{ $slug != null ? $slug : old('slug') }}">
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">قیمت</label>
                        <div class="col-md-10">
                            <input required type="text" name="price"
                                   class="form-control rounded"
                                   placeholder="قیمت را وارد کنید"
                                   value="{{ $price != null ? $price : old('price') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">توضیحات</label>
                        <div class="col-md-10">
                                 <textarea required name="description" class="form-control"
                                           rows="5"
                                           placeholder="توضیحات را وارد کنید">{{ $description != null ? $description : old('description') }}</textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">مرکز</label>
                        <div class="col-md-10">

                            <select required class="form-control rounded" name="center_id">

                                @foreach($centers as $s)

                                    <option
                                        {{ $type == 'edit' && $s->id == $option->center_id ? 'selected' : old('center_id') }} value="{{ $s->id }}"> {{ $s->name }}
                                        | {{ $s->state->name }} </option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">عکس</label>
                        <div class="col-md-10">
                            <input {{ $type != 'edit' ? "required" : "" }} type="file" name="images"
                                   class="form-control rounded"
                                   placeholder="عکس را وارد کنید"
                                   value="{{ old('images') }}">

                            @if($type == 'edit')

                                <div class="row">
                                    <br>
                                    @foreach( $option->images['images'] as $key => $image)
                                        <div class="col-sm-2 col-xs-10 "
                                             style="border-radius: 20px;box-shadow: 5px 10px 18px rgba(32,32,32,0.55); margin-right: 30px ; margin-top: 30px">
                                            <label class="control-label">
                                                {{ $key }}
                                                <input required type="radio" name="imagesThumb"
                                                       value="{{ $image }}" {{ $option->images['thumb'] == $image ? 'checked' : '' }} />
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
                            <a href="{{ route('work-times.index') }}"
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

        $("#title").on('keyup' , function () {

            data = $("#title").val()
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
