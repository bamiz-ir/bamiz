<div class="row">

    @if (session()->has('message'))
        <script>
            Swal.fire({
                title: "تبریک ! 🥳",
                icon: 'success',
                text: '{{ session('message') }}',
                type: "success",
                cancelButtonColor: 'var(--primary)',
                confirmButtonText: 'اوکی',
            })
        </script>

    @endif
    <div class="col-lg-12">
        <div class="card-box">
            <div class="card-block">
                <h4 class="card-title">{{$titlePage}}</h4>

                @include('livewire.admin.searchBox')

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>نام کابری</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>وضعیت</th>
                        <th>تلفن</th>
                        <th>نقش</th>
                        <th>عکس</th>
                        <th>تاریخ انتشار</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $item)
                        <tr>
                            <td>{{$item->username}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->lastName}}</td>
                            <td>{{$item->email}}</td>
                            <td>

                                <span class=" @if($item->active)

                                {{ "label label-success-border rounded" }}

                                @else

                                {{ "label label-danger-border rounded" }}

                                @endif">

{{--                                    //////////////////////////////////////////////////////////--}}

                                    @if($item->active)

                                        فعال

                                    @else

                                        غیر فعال

                                    @endif

                                </span>

                            </td>
                            <td>{{$item->phone}}</td>
                            <td>

                                <span class=" @if($item->level == 'admin')

                                {{ "label label-success-border rounded" }}

                                @else

                                {{ "label label-info-border rounded" }}

                                @endif">

{{--                                    //////////////////////////////////////////////////////////--}}

                                    @if($item->level == 'admin')

                                        مدیر

                                    @else

                                        کابر

                                    @endif

                                </span>

                            </td>
                            <td><img width="60" src="{{ $item->profile_photo_path ?  \Illuminate\Support\Facades\Storage::url($item->profile_photo_path)  : 'https://www.hardiagedcare.com.au/wp-content/uploads/2019/02/default-avatar-profile-icon-vector-18942381.jpg'}}" alt="عکس کابر"> </td>

                            <td>{{ \Hekmatinasser\Verta\Verta:: instance($item->created_at)->format('%B %d، %Y') }}</td>
                            <td>
                                <div class="buttons ">
                                    <a wire:click="$emit('triggerRestore' , {{ $item->id }})"
                                       class="btn btn-primary btn-action mr-1"
                                       data-toggle="tooltip" title=""
                                       data-original-title="آزاد سازی"><i
                                            class="fas fa-pencil-alt"></i><i
                                            class="fa fa-refresh"> </i> </a>
                                    <button wire:click="$emit('triggerDelete' , {{ $item->id }})"
                                            type="button"
                                            data-original-title="حذف"
                                            data-toggle="tooltip"
                                            class="btn btn-danger btn-action"><i
                                            class="fa fa-trash"> </i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $users->links('livewire.admin.pagination') }}

            </div>
        </div>
    </div>
</div>
@push('StackScript')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerDelete', orderId => {
            Swal.fire({
                title: "هشدار ! ",
                icon: 'warning',
                text: "آیا می خواهید این کابر حذف شود ؟ 🤔",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#00aced',
                cancelButtonColor: '#e6294b',
                confirmButtonText: 'حذف',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                @this.call('destroy', orderId)
                    // success response
                    Swal.fire({
                        title: session('message'),
                        icon: 'success',
                        type: 'success'
                    });

                }
            });
        });
        })
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerRestore', orderId => {
            Swal.fire({
                title: "هشدار ! ",
                icon: 'warning',
                text: "آیا می خواهید این کابر از بلاک خارج شود ؟ 🤔",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#00aced',
                cancelButtonColor: '#e6294b',
                confirmButtonText: 'آزاد سازی',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                @this.call('restore', orderId)
                    // success response
                    Swal.fire({
                        title: session('message'),
                        icon: 'success',
                        type: 'success'
                    });

                }
            });
        });
        })
    </script>
@endpush

