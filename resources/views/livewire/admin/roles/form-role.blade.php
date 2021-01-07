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

                <form  class="form-horizontal"
                      action="{{ $type == 'edit' ? route('roles.update' , $role_id) : route('roles.store') }}"
                      method="post"
                      enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                        <div class="form-group">
                            <label class="control-label col-lg-2">نام مقام</label>
                            <div class="col-md-10">
                                <input wire:model.defer="name" required id="title" type="text" name="name"
                                       class="form-control rounded"
                                       placeholder="نام مقام را وارد کنید" value="{{ $name != null? $name : old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">دسترسی ها</label>
                            <div class="col-lg-10">
                                <select wire:model.defer="permission_id" required name="permission_id[]"
                                        class="selectpicker form-control" multiple data-live-search="true">
                                    @foreach($permissions as $item)

                                        <option
                                            @if(in_array($item->id , $permission_id)) selected  @endif
                                            value="{{ $item->id }}">
                                            {{ $item->name }} </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('roles.index') }}"
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
