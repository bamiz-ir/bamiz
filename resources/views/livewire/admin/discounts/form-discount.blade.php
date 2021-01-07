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
                      wire:submit.prevent="{{ $type == 'edit' ? "edit($discount_id)"  :  "store"}}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                        <div class="form-group">
                            <label class="control-label col-lg-2">مرکز(کافه رستوران)</label>
                            <div class="col-md-10">

                                <select wire:model="center_id" required class="form-control rounded" name="center_id">

                                    <option value="">بدون مرکز</option>

                                    @foreach($centers as $s)

                                        <option
                                            {{ $type == 'edit' && $s->id == $discount->center_id ? 'selected' : old('center_id') }} value="{{ $s->id }}">{{ $s->name }}</option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">غذا مورد نظر</label>
                            <div class="col-md-10">

                                <select wire:model.defer="product_id" required class="form-control rounded" name="product_id">

                                    <option value="">بدون غذا</option>

                                    @foreach($products as $s)

                                        <option
                                            {{ $type == 'edit' && $s->id == $discount->product_id ? 'selected' : old('product_id') }} value="{{ $s->id }}">{{ $s->title }}</option>

                                    @endforeach

                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">درصد تخفیف</label>
                            <div class="col-md-10">
                                <input wire:model.defer="percent" required type="text" name="percent"
                                       class="form-control rounded"
                                       placeholder="درصد تخفیف را وارد کنید" value="{{ $percent != null? $percent : old('percent') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">تعداد افراد قابل استفاده</label>
                            <div class="col-md-10">
                                <input wire:model.defer="use_count" required type="text" name="use_count"
                                       class="form-control rounded"
                                       placeholder="تعداد افراد قابل استفاده را وارد کنید" value="{{ $use_count != null? $use_count : old('use_count') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">تاریخ انقضا</label>
                            <div class="col-md-10">
                                <input wire:model.defer="expiration" required type="date" name="expiration"
                                       class="form-control rounded"
                                       placeholder="تاریخ انقضا را وارد کنید" value="{{ $expiration != null? $expiration : old('expiration') }}">
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('discounts.index') }}"
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
