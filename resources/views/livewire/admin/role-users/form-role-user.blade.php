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
                       action="{{ $type == 'edit' ? route('roles_users.update' , $user_id) : route('roles_users.store') }}"
                       method="post"
                       enctype="multipart/form-data">

                    @if($type == 'edit')
                        @method('PATCH')
                    @endif

                    @csrf

                    <div class="form-group">
                        <label class="control-label col-lg-2">کاربر</label>
                        <div class="col-lg-10">
                            <select wire:model.defer="user_id" required name="user_id"
                                    class="selectpicker form-control" data-live-search="true">
                                @foreach($users as $item)

                                    <option
                                    value="{{ $item->id }}">
                                        {{ $item->username }} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">مقام ها</label>
                            <div class="col-lg-10">
                                <select wire:model.defer="role_id" required name="role_id[]"
                                        class="selectpicker form-control" multiple data-live-search="true">
                                    @foreach($roles as $item)

                                        <option
                                        value="{{ $item->id }}">
                                            {{ $item->name }} </option>

                                    @endforeach
                                </select>
                            </div>
                        </div>

                    <div class="col-lg-12">
                        <div class="m-1-25 m-b-20">
                            <button class="btn btn-info btn-border-radius waves-effect" type="submit">ثبت</button>
                            <a href="{{ route('roles_users.index') }}"
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
