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

                <form class="form-horizontal"  wire:submit.prevent="{{ "edit($comment_id)"}}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">عنوان</label>
                        <div class="col-md-10">
                            <input wire:model.defer="title" required id="title" type="text" name="title"
                                   class="form-control rounded"
                                   placeholder="عنوان را وارد کنید" value="{{ $title != null? $title : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">متن</label>
                        <div wire:model.defer="body" class="col-md-10">
                              <textarea required rows="8" type="text" name="body" id="body"
                                        class="form-control"
                                        placeholder="متن را وارد کنید"> {{ $body != null ? $body : old('body') }} </textarea>
                        </div>
                    </div>


                        <div class="form-group">
                            <label class="control-label col-lg-2">نوع مدل</label>
                            <div class="col-md-10">

                                <select wire:model="commentable_type" required class="form-control rounded" name="model">

                                    <option value="App\Models\Article">مقاله</option>
                                    <option value="App\Models\Center">مرکز</option>

                                </select>

                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">مرکز | مقاله</label>
                        <div class="col-md-10">

                            <select wire:model.defer="commentable_id" required class="form-control rounded" name="center_id">

                                <option value=""> ندارد</option>

                                @foreach($Names as $c)

                                    <option {{ $commentable_id == $c->id ? "selected" : "" }}  value="{{ $c->id }}">{{ $commentable_type == 'App\Models\Article' ? $c->title :  $c->name }}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">وضعیت</label>
                            <div class="col-md-10">

                                <select wire:model.defer="status" required class="form-control rounded" name="status">

                                    <option @if($comment->status) selected @endif  value="1">تایید شده</option>
                                    <option  @if($comment->status == false) selected @endif value="0">تایید نشده</option>

                                </select>

                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('comments.index') }}"
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
        })

    </script>

@endpush
