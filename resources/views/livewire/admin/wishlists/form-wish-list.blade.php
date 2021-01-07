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
                      wire:submit.prevent="{{ $type == 'edit' ? "edit($wishlist_id)" : "store" }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                        <div class="form-group">
                            <label class="control-label col-lg-2">کاربر</label>
                            <div class="col-lg-10">
                                <select wire:model.deferl="user_id" required name="user_id"
                                        class="form-control rounded">

                                    <option value="">بدون کاربر</option>

                                    @foreach($users as $u)

                                        <option value="{{ $u->id }}">{{ $u->username }}</option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نوع</label>
                        <div class="col-lg-10">
                            <select wire:model="wish_listable_type" required name="wish_listable_type"
                                    class="form-control rounded">

                                <option value="">بدون نوع</option>
                                <option  value="App\Models\Center">مرکز</option>
                                <option  value="App\Models\Product">غذا</option>
                                <option  value="App\Models\Option">تشریفات</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">نوع علاقه مندی</label>
                        <div class="col-md-10">

                            <select wire:model.defer="wish_listable_id" required class="form-control"
                                    multiple data-live-search="true" name="wish_listable_id[]">

                                @foreach($types as $s)

                                    <option

                                        value="{{ $s->id }}">

                                        @if($wish_listable_type == "App\Models\Center")

                                            {{ $s->name }}

                                        @else
                                            {{ $s->title }}
                                        @endif

                                    </option>

                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('wish-lists.index') }}"
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
