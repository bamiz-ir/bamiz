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

                <form wire:submit.prevent="{{ $type == 'edit'? "edit($city_id)" : 'store' }}" class="form-horizontal"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">نام شهر</label>
                        <div class="col-md-10">
                            <input required id="slug" wire:model.lazy="name" type="text" name="name"
                                   class="form-control rounded"
                                   placeholder="نام شهر را وارد کنید"
                                   value="{{ $name != null ? $name : old('name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نامک ( slug )</label>
                        <div class="col-md-10">
                            <input required id="slug" wire:model.defer="slug" type="text" name="slug"
                                   class="form-control rounded"
                                   placeholder="نامک را وارد کنید"
                                   value="{{ $slug != null ? $slug : old('slug') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">استان</label>
                            <div class="col-md-10">

                                <select required class="form-control rounded" wire:model.defer="state_id" name="status_id">

                                    <option value="">بدون استان</option>
                                    @foreach($states as $s)

                                        <option {{ $type == 'edit' && $s->id == $city->state_id && 'selected' }} value="{{ $s->id }}"> {{ $s->name }} </option>

                                    @endforeach

                                </select>

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
