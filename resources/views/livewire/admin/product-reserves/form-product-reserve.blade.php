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

                <form wire:submit.prevent="{{ $type == 'edit'  ?  "edit($product_reserve_id)"  :  "store" }}"
                      class="form-horizontal"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">رزرو ها</label>
                        <div class="col-md-10">
                            <select wire:model="reserve_id" required class="form-control rounded" name="reserve_id">

                                <option value="">بدون رزرو</option>

                                @foreach($reserves as $s)


                                    <option
                                        {{ $type == 'edit' && $s->id == $product_reserve->reserve_id ? 'selected' : old('reserve_id') }} value="{{ $s->id }}"> {{ $s->user->username }}
                                        | {{ $s->center->name }} </option>

                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-2">مراکز</label>
                        <div class="col-md-10">
                            <select wire:model="center_id" required class="form-control rounded" name="center_id">


                                <option value="">بدون مرکز</option>

                                @foreach($centers as $s)

                                    <option
                                        {{ $type == 'edit' && $s->id == $product_reserve->product_id ? "selected"  : old('center_id')}}
                                        value="{{ $s->id }}"> {{ $s->name }} </option>

                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">غذا ها</label>
                        <div class="col-md-10">
                            <select wire:model="product_id" multiple required class="form-control" name="product_id[]">

                                <option value="">بدون غذا</option>

                                @foreach($products as $s)


                                    <option
                                        {{ $type == 'edit' && $s->id == $product_reserve->product_id ? "selected"  : old('product_id')}}
                                        value="{{ $s->id }}"> {{ $s->title }} </option>

                                @endforeach


                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('product_reserves.index') }}"
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
