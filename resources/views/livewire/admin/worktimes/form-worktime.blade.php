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
                      action="{{ $type == 'edit' ? route('work-times.update' , $worktime_id) :  route('work-times.store')}}"
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

                                @foreach($centers as $s)

                                    <option
                                        {{ $type == 'edit' && $s->id == $workTime->center_id ? 'selected' : old('center_id') }} value="{{ $s->id }}"> {{ $s->name }}
                                        | {{ $s->state->name }} </option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">روز های هفته</label>
                        <div class="col-lg-10">
                            <select wire:model.defer="week_days"  required name="week_days[]"
                                    class="selectpicker form-control" multiple data-live-search="true">
                                <option value="شنبه">شنبه</option>
                                <option value="یکشنبه">یکشنبه</option>
                                <option value="دو شنبه">دو شنبه</option>
                                <option value="سه شنبه">سه شنبه</option>
                                <option value="چهار شنبه">چهار شنبه</option>
                                <option value="پنچ شنبه">پنچ شنبه</option>
                                <option value="جمعه">جمعه</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">از ساعت</label>
                        <div class="col-md-10">
                            <input required type="text" name="fromHour"
                                   class="form-control rounded"
                                   placeholder="از ساعت کاری را وارد کنید"
                                   value="{{ $fromHour != null ? $fromHour : old('fromHour') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">تا ساعت</label>
                        <div class="col-md-10">
                            <input required type="text" name="toHour"
                                   class="form-control rounded"
                                   placeholder="تا ساعت کاری را وارد کنید"
                                   value="{{ $toHour != null ? $toHour : old('toHour') }}">
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



