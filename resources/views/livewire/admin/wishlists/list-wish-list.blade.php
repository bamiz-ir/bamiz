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
                        <th>کاربر</th>
                        <th>مورد علاقه</th>
                        <th>تاریخ ثبت</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($wish_lists as $item)
                        <tr>
                            <td>{{$item->user->username}}</td>
                            <td>
                                @if($item->wish_listable_type == 'App\Models\Center')
                                    {{ $item->wish_listable->name }}
                                @else
                                    {{ $item->wish_listable->title }}
                                @endif
                            </td>
                            <td>{{ \Hekmatinasser\Verta\Verta:: instance($item->created_at)->format('%B %d، %Y') }}</td>
                            <td>
                                <div class="buttons ">
                                    <a href="{{ route('wish-lists.edit' , $item->id) }}"
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
                    @endforeach
                    </tbody>
                </table>

                {{ $wish_lists->links('livewire.admin.pagination') }}

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
                text: "آیا می خواهید این مورد از علاقه مندی ها حذف شود ؟ 🤔",
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
