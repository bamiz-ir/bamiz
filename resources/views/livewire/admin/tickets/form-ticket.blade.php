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
                      action="{{ $type == 'edit' ? route('tickets.update' , $ticket_id) :  route('tickets.store')}}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">عنوان</label>
                        <div class="col-md-10">
                            <input required type="text" name="title"
                                   class="form-control rounded"
                                   placeholder="عنوان را وارد کنید"
                                   value="{{ $title != null ? $title : old('title') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">متن</label>
                        <div class="col-md-10">
                            <textarea required name="text" class="form-control"
                                      rows="5"
                                      placeholder="متن را وارد کنید">{{ $text != null ? $text : old('text') }}</textarea>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">کاربر</label>
                            <div class="col-md-10">

                                <select required class="form-control rounded" name="user_id">

                                    @foreach($users as $s)

                                        <option
                                            {{ $type == 'edit' && $s->id == $ticket->user_id ? 'selected' : old('user_id') }} value="{{ $s->id }}"> {{ $s->username }} </option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('tickets.index') }}"
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



