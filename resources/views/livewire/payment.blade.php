<div>

    <div class="container">

        <form class="form-horizontal"
              action="{{ route('payment') }}"
              method="post"
              enctype="multipart/form-data">

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

                        @foreach($times as $c)

                            <option value="{{ $c }}">ساعت {{ $c }} </option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">میز ها</label>
                <div class="col-md-10">

                    <select wire:model.defer='chair_id' multiple required class="form-control" name="chair_id[]"
                            multiple data-live-search="true">

                        @foreach($chairs as $c)
                            <option value="{{ $c['id'] }}">{{ $c['number'] }}</option>
                        @endforeach

                    </select>

                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-lg-2">تعداد مهمانان</label>
                <div class="col-md-10">
                    <input required wire:model.defer="guest_count" type="text" name="guest_count"
                           class="form-control rounded"
                           placeholder="تعداد مهمانان را وارد کنید"
                           value="{{ $guest_count != null ? $guest_count : old('guest_count') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">سفارش غذا ها</label>
                <div class="col-md-10">

                    <select wire:model.defer='product_id' multiple class="form-control" name="product_id[]"
                            multiple data-live-search="true">

                        <option value="0">غذا سفارش نمیدم</option>

                        @foreach($products as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">تشریفات ویژه</label>
                <div class="col-md-10">

                    <select wire:model.defer='option_id' multiple class="form-control" name="option_id[]"
                            multiple data-live-search="true">

                        <option value="0">تشریفاتی ندارم</option>

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
                    <button class="btn btn-info btn-border-radius waves-effect" type="submit">پرداخت</button>

                </div>
            </div>
        </form>


    </div>


</div>
