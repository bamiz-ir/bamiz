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
                        <th>عنوان</th>
                        <th>نامک</th>
                        <th>کلمه کلیدی</th>
                        <th>وضعیت</th>
                        <th>مرکز</th>
                        <th>تعداد لایک</th>
                        <th>تعداد بازدید</th>
                        <th>تاریخ انتشار</th>
                        <th>عکس</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($articles as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->slug}}</td>
                            <td>{{$item->keywords}}</td>
                            <td>

                                <span class=" @if($item->status == 0)

                                {{ "label label-info-border rounded" }}

                                @elseif($item->status == 1)

                                {{ "label label-success-border rounded" }}

                                @else

                                {{ "label label-danger-border rounded" }}

                                @endif">

{{--                                    //////////////////////////////////////////////////////////--}}

                                @if($item->status == 0)

                                        پیش نویس

                                    @elseif($item->status == 1)

                                        منتشر شده

                                    @else

                                        پایان انتشار

                                    @endif

                                </span>

                            </td>
                            <td> {{ $item->center->name }} </td>
                            <td>{{$item->LikeCount}}</td>
                            <td>{{$item->ViewCount}}</td>
                            <td>{{ \Hekmatinasser\Verta\Verta:: instance($item->created_at)->format('%B %d، %Y') }}</td>
                            <td><img width="60" src="{{ $item->images['images']['300'] }}" alt="عکس مقاله"></td>
                            <td>
                                <div class="buttons ">
                                    <a href="{{ route('articles.edit' , $item->id) }}"
                                       class="btn btn-primary btn-action mr-1"
                                       data-toggle="tooltip" title=""
                                       data-original-title="ویرایش"><i
                                            class="fas fa-pencil-alt"></i><i
                                            class="fa fa-pencil"> </i> </a>
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

                {{ $articles->links('livewire.admin.pagination') }}

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
                text: "آیا می خواهید این دسته بندی حذف شود ؟ 🤔",
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
