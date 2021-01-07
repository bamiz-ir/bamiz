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
                      action="{{ $type == 'edit' ? route('categories.update' , $cat_id) : route('categories.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">عنوان دسته بندی</label>
                        <div class="col-md-10">
                            <input required id="title" type="text" wire:model.lazy="title" name="title"
                                   class="form-control rounded"
                                   placeholder="عنوان را وارد کنید" value="{{ $title != null? $title : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نامک ( slug )</label>
                        <div class="col-md-10">
                            <input required id="slug" wire:model="slug" type="text" name="slug"
                                   class="form-control rounded"
                                   placeholder="نامک را وارد کنید"
                                   value="{{ $slug != null ? $slug : old('slug') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">سر دسته</label>
                        <div class="col-lg-10">
                            <select required wire:model.defer="chid" name="chid" class="form-control rounded">

                                <option value="0">بدون دسته بندی</option>

                                @if($type == 'edit')

                                    @foreach($categories as $item)

                                        @if($item->id != $cat_id)

                                            <option
                                                value="{{ $item->id }}" {{ $item->id == $chid && "selected" }} > {{ $item->title }} </option>

                                        @endif

                                    @endforeach


                                @else

                                    @foreach($categories as $item)

                                        <option value="{{ $item->id }}"> {{ $item->title }} </option>

                                    @endforeach

                                @endif

                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">عکس</label>
                            <div class="col-md-10">
                                <input {{ $type == '' ? 'required' : '' }} id="slug" type="file" name="images"
                                       class="form-control rounded"
                                       placeholder="عکس را وارد کنید">

                                @if($type == 'edit')
                                    <div class="row">
                                        <br>
                                        @foreach( $category->images['images'] as $key => $image)
                                            <div class="col-sm-2 col-xs-10 "
                                                 style="border-radius: 20px;box-shadow: 5px 10px 18px rgba(32,32,32,0.55); margin-right: 30px ; margin-top: 30px">
                                                <label class="control-label">
                                                    {{ $key }}
                                                    <input required type="radio" name="imagesThumb"
                                                           value="{{ $image }}" {{ $category->images['thumb'] == $image ? 'checked' : '' }} />
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
                            <a href="{{ route('categories.index') }}"
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
