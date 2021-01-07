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
                      action="{{ $type == 'edit' ? route('articles.update' , $article_id) : route('articles.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">عنوان</label>
                        <div class="col-md-10">
                            <input required id="title" type="text" name="title"
                                   class="form-control rounded"
                                   placeholder="عنوان را وارد کنید" value="{{ $title != null? $title : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نامک ( slug )</label>
                        <div class="col-md-10">
                            <input required id="slug" type="text" name="slug"
                                   class="form-control rounded"
                                   placeholder="نامک را وارد کنید"
                                   value="{{ $slug != null ? $slug : old('slug') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">کلمه کلیدی</label>
                        <div class="col-md-10">
                            <input required type="text" name="keywords"
                                   class="form-control rounded"
                                   placeholder="کلمه کلیدی را وارد کنید"
                                   value="{{ $keywords != null ? $keywords : old('keywords') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">تگ ها</label>
                        <div class="col-md-10">
                            <small style="color: red">لطفا تگ ها را با علامت "،" جدا کنید !</small>
                            <input required type="text" name="tags"
                                   class="form-control rounded"
                                   placeholder="تگ ها را وارد کنید"
                                   value="{{ $tags != null ? $tags : old('tags') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">متن کوتاه</label>
                        <div class="col-md-10">
                                <textarea required rows="5" type="text" name="short_text"
                                          class="form-control"
                                          placeholder="متن کوتاه را وارد کنید"> {{ $short_text != null ? $short_text : old('short_text') }} </textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">متن</label>
                        <div class="col-md-10">
                                <textarea required rows="8" type="text" name="body" id="body"
                                          class="form-control rounded"
                                          placeholder="متن را وارد کنید"> {{ $body != null ? $body : old('body') }} </textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">وضعیت</label>
                        <div class="col-md-10">

                            <select required class="form-control rounded" name="status">

                                <option @if($status == 0) selected @endif value="0">پیش نویس</option>
                                <option @if($status == 1) selected @endif value="1">منتشر شده</option>
                                <option @if($status == 2) selected @endif value="2">پایان انتشار</option>

                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">مرکز</label>
                            <div class="col-md-10">

                                <select required class="form-control rounded" name="center_id">

                                    @foreach($centers as $c)

                                        <option {{ $type == 'edit' && $c->id == $article->center_id ? "selected" : "" }} value="{{ $c->id }}">{{ $c->name }}</option>

                                    @endforeach
                                </select>

                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">عکس</label>
                        <div class="col-sm-10">

                            <input @if($type != 'edit') required @endif type="file" name="images"
                                   class="form-control rounded"
                                   placeholder="عکس را وارد کنید"
                                   value="{{ old('images') }}">

                            @if($type == 'edit')

                                <div class="row">
                                    <br>
                                    @foreach( $article->images['images'] as $key => $image)
                                        <div class="col-sm-2 col-xs-10 "
                                             style="border-radius: 20px;box-shadow: 5px 10px 18px rgba(32,32,32,0.55); margin-right: 30px ; margin-top: 30px">
                                            <label class="control-label">
                                                {{ $key }}
                                                <input required type="radio" name="imagesThumb"
                                                       value="{{ $image }}" {{ $article->images['thumb'] == $image ? 'checked' : '' }} />
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
                            <a href="{{ route('articles.index') }}"
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
