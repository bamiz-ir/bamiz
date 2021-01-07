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
                        <th>نام مقام</th>
                        <th>دسترسی ها</th>
                        <th>تاریخ ثبت</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($role_users as $item)

                        @if($item->roles->toArray() != [])
                            <tr>
                                @php
                                    $roles = [];
                                    foreach ($item->roles as $key => $ro)
                                        {
                                            $roles[$key] = $ro->name;
                                        }
                                @endphp

                                <td>{{ $item->username }}</td>
                                <td>{{ join(' , ' , $roles) }}</td>
                                <td>{{ \Hekmatinasser\Verta\Verta:: instance($item->created_at)->format('%B %d، %Y') }}</td>
                                <td>
                                    <div class="buttons ">
                                        <a href="{{ route('roles_users.edit' , $item->id) }}"
                                           class="btn btn-primary btn-action mr-1"
                                           data-toggle="tooltip" title=""
                                           data-original-title="ویرایش"><i
                                                class="fas fa-pencil-alt"></i><i
                                                class="fa fa-pencil"> </i> </a>
                                        <button wire:click="$emit('triggerDelete',{{ $item->id }})"
                                                type="button"
                                                data-original-title="حذف"
                                                data-toggle="tooltip"
                                                class="btn btn-danger btn-action"><i
                                                class="fa fa-trash"> </i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif

                    @endforeach
                    </tbody>
                </table>

                {{ $role_users->links('livewire.admin.pagination') }}

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
                text: "آیا می خواهید این مقام/مقام ها از کاربر مورد نظر پس گرفته شود ؟ 🤔",
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
@endpush
