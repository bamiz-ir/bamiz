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
                      action="{{ $type == 'edit' ? route('galleries.update' , $gallery_id) : route('galleries.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">مرکز</label>
                        <div class="col-md-10">

                            <select required class="form-control rounded" name="center_id">

                                @foreach($centers as $c)

                                    <option {{ $type == 'edit' && $c->id == $gallery->center_id ? "selected" : "" }}
                                            value="{{ $c->id }}">{{ $c->name }} | {{ $c->state->name }}</option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">نوع</label>
                            <div class="col-md-10">

                                <select wire:model.defer="galley_type" required class="form-control rounded" name="type">

                                    <option value="image">عکس</option>
                                    <option value="teaser">تیزر</option>

                                </select>

                            </div>
                        </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">عکس</label>
                        <div class="col-sm-10">

                            <input @if($type != 'edit') required @endif multiple type="file" name="captions[]"
                                   class="form-control rounded"
                                   placeholder="عکس را وارد کنید"
                                   value="{{ old('captions') }}">

                            @if($type == 'edit')

                                <div class="row">
                                    <br>
                                    @foreach( $gallery->captions as $key => $image)
                                        <div class="col-sm-2 col-xs-10 "
                                             style="border-radius: 20px;box-shadow: 5px 10px 18px rgba(32,32,32,0.55); margin-right: 30px ; margin-top: 30px">
                                            <label class="control-label">
                                                {{ $key +  1}}
                                                @if($key != 0)
                                                    <input wire:click="DeleteImage({{ $key }})" type="button"
                                                           class="btn btn-danger"
                                                           style="margin-bottom: 10px; margin-right: 10px"
                                                           value="حذف">
                                                @endif

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
                            <a href="{{ route('galleries.index') }}"
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
