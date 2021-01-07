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

                <form wire:submit.prevent="{{ $type == 'edit'? "edit($chair_id)" : 'store' }}" class="form-horizontal"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">شماره میز</label>
                        <div class="col-md-10">
                            <input required id="slug" wire:model.lazy="number" type="text" name="number"
                                   class="form-control rounded"
                                   placeholder="شماره میز را وارد کنید"
                                   value="{{ $number != null ? $number : old('number') }}">
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">مرکز</label>
                            <div class="col-md-10">

                                <select wire:model.defer="center_id" required class="form-control rounded" name="center_id">

                                    <option value="">بدون مرکز</option>

                                    @foreach($centers as $s)

                                        <option
                                            {{ $type == 'edit' && $s->id == $chair->center_id ? 'selected' : old('center_id') }} value="{{ $s->id }}"> {{ $s->name }}
                                            | {{ $s->state->name }} </option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('chairs.index') }}"
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
