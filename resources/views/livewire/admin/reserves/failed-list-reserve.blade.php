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
                        <th>مرکز</th>
                        <th>کاربر</th>
                        <th>میز ها</th>
                        <th>غذا ها</th>
                        <th>تشریفات</th>
                        <th>تعداد مهمانان</th>
                        <th>ساعت</th>
                        <th>قیمت بامیز(قیمت اختصاصی به بامیز به ازای نفر)</th>
                        <th>تاریخ رزرو</th>
                        <th>اعمال</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($reserves as $item)
                        <tr>
                            <td>{{$item->center->name}}</td>
                            <td>{{$item->user->username }}</td>
                            @php
                                $chairs  = [];
                                    $products = [];
                                    foreach ($item->products as $key => $p)
                                        {
                                            $products[$key] = $p->title;
                                        }

                                    $options = [];
                                    foreach ($item->options as $key => $o)
                                        {
                                            $options[$key] = $o->title;
                                        }

                            @endphp
                            <td>{{ $item->chair ?  $item->chair->number :  'ندارد' }}</td>
                            <td>{{$products ?  join(' , ' , $products)  : 'ندارد'}}</td>
                            <td>{{$options ?  join(' , ' , $options)  : 'ندارد' }}</td>
                            <td>{{$item->guest_count }}</td>
                            <td>{{$item->time }}</td>
                            <td>{{$item->price }}</td>
                            <td>{{ \Hekmatinasser\Verta\Verta::instance($item->date)->format('%B %d، %Y') }}</td>
                            <td>
                                <div class="buttons ">
                                    <button wire:click="$emit('triggerSuccess',{{ $item->id }})"
                                            type="button"
                                            data-original-title="موفق"
                                            data-toggle="tooltip"
                                            class="btn btn-primary btn-action"><i
                                            class="fa fa-refresh"> </i>
                                    </button>
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

                    {{ $reserves->links('livewire.admin.pagination') }}

                </table>
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
                text: "آیا می خواهید این رزرو حذف شود ؟ 🤔",
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

        @this.on('triggerSuccess', orderId => {
            Swal.fire({
                title: "هشدار ! ",
                icon: 'warning',
                text: "آیا می خواهید این رزرو به موفق تبدیل شود ؟ 🤔",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#00aced',
                cancelButtonColor: '#e6294b',
                confirmButtonText: 'موفق',
                cancelButtonText: 'انصراف'
            }).then((result) => {
                //if user clicks on delete
                if (result.value) {
                    // calling destroy method to delete
                @this.call('success', orderId)
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
