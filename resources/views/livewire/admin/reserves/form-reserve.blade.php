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

                @if(session()->has('center'))

                    <div class="alert alert-danger">

                        {{ session()->get('center') }}

                    </div>

                @endif

                <form class="form-horizontal"
                      action="{{ $type == 'edit'  ?  route('reserves.update' , $reserve_id)  :  route('reserves.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">مرکز</label>
                        <div class="col-md-10">

                            <select wire:model='center_id' required class="form-control rounded" name="center_id">

                                <option value="">بدون مرکز</option>

                                @foreach($centers as $c)

                                    <option
                                        {{ $type == 'edit' && $c->id == $reserve->center_id ? "selected" : "" }} value="{{ $c->id }}">{{ $c->name }}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">کاربر</label>
                        <div class="col-md-10">

                            <select wire:model.defer="user_id" required class="form-control rounded" name="user_id">

                                <option value="">بدون کاربر</option>

                                @foreach($users as $c)

                                    <option
                                        {{ $type == 'edit' && $c->id == $reserve->user_id ? "selected" : "" }} value="{{ $c->id }}">{{ $c->username }}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">تاریخ</label>
                        <div class="col-md-10">
                            <input required wire:model="date" type="date" name="date"
                                   class="form-control rounded"
                                   placeholder=" تاریخ را وارد کنید"
                                   value="{{ $date != null ? $date : old('date') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">زمان</label>
                        <div class="col-md-10">
                            <select wire:model='time' required class="form-control rounded" name="time">

                                <option value="">بدون زمان</option>

                                @foreach($times as $c)

                                    <option value="{{ $c }}">ساعت {{ $c }} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">میز ( اختیاری )</label>
                        <div class="col-md-10">

                            <select wire:model.defer='chair_id' class="form-control rounded" name="chair_id">

                                <option value="0">بدون میز</option>

                                @foreach($chairs as $c)
                                    <option value="{{ $c['id'] }}">{{ $c['number'] }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">تعداد مهمانان ( صندلی ها)</label>
                        <div class="col-md-10">
                            <input required wire:model.defer="guest_count" type="text" name="guest_count"
                                   class="form-control rounded"
                                   placeholder="تعداد مهمانان را وارد کنید"
                                   value="{{ $guest_count != null ? $guest_count : old('guest_count') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">سفارش غذا ها (اختیاری)</label>
                        <div class="col-md-10">

                            <select wire:model.defer='product_id' multiple class="form-control" name="product_id[]"
                                    multiple data-live-search="true">

                                @foreach($products as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">تشریفات ویژه (اختیاری)</label>
                        <div class="col-md-10">

                            <select wire:model.defer='option_id' multiple class="form-control" name="option_id[]"
                                    multiple data-live-search="true">

                                @foreach($options as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">قیمت رزرو</label>
                        <div class="col-md-10">
                            <input required wire:model.defer="price" type="text" readonly name="price"
                                   class="form-control rounded"
                                   placeholder="قیمت را وارد کنید"
                                   value="{{ $price != null ? $price : old('price') }}">
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('reserves.index') }}"
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
