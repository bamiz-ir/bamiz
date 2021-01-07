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
                        <th>پیش نمایش متن</th>
                        <th>کاربر</th>
                        <th>مرکز | مقاله</th>
                        <th>تعداد لایک</th>
                        <th>امتیاز</th>
                        <th>تاریخ انتشار</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($comments as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{\Illuminate\Support\Str::limit($item->body , 20)}}</td>
                            <td>{{$item->user->username}}</td>
                            <td>
                                {{ $item->commentable_type == 'App\Models\Article' ?  $item->commentable->title  :  $item->commentable->name }}
                            </td>
                            <td>{{$item->LikeCount}}</td>
                            <td>{{$item->score}}</td>
                            <td>{{ \Hekmatinasser\Verta\Verta:: instance($item->created_at)->format('%B %d، %Y') }}</td>
                            <td>
                                <div class="buttons ">
                                    <a href="{{ route('comments.edit' , $item->id) }}"
                                       class="btn btn-primary btn-action mr-1"
                                       data-toggle="tooltip" title=""
                                       data-original-title="ویرایش"><i
                                            class="fas fa-pencil-alt"></i><i
                                            class="fa fa-pencil"> </i> </a>
                                    <button wire:click="$emit('triggerNotApproved' , {{ $item->id }})"
                                            type="button"
                                            data-original-title="تایید نکردن"
                                            data-toggle="tooltip"
                                            class="btn btn-danger btn-action"><i
                                            class="fa fa-ban"> </i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $comments->links('livewire.admin.pagination') }}

            </div>
        </div>
    </div>
</div>
@push('StackScript')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerNotApproved', orderId => {
            Swal.fire({
                title: "هشدار ! ",
                icon: 'warning',
                text: "آیا می خواهید این نظر به تایید نشده ها منتقل شود ؟ 🤔",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#00aced',
                cancelButtonColor: '#e6294b',
                confirmButtonText: 'تایید نشود',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                @this.call('NotApproved', orderId)
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
