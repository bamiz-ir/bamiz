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

                <form wire:submit.prevent="{{ $type == 'edit'? "edit($setting_id)" : 'store' }}" class="form-horizontal"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">کلید</label>
                        <div class="col-md-10">
                            <input required id="slug" wire:model.defer="key" type="text" name="key"
                                   class="form-control rounded"
                                   placeholder="کلید را وارد کنید"
                                   value="{{ $key != null ? $key : old('key') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">مقدار</label>
                            <div class="col-md-10">
                                <textarea wire:model.defer="value" required name="value" class="form-control"
                                          rows="5" placeholder="مقدار را وارد کنید"> {{ $value != null ? $value : old('value') }} </textarea>
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('settings.index') }}"
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
