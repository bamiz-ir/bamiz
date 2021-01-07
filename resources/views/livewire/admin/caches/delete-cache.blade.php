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

        @if(session()->has('hasKey'))
            <div id="errors" class="alert alert-success">کش مورد نظر در دسترس است</div>
        @endif

        <hr>

        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <input type="button" wire:click="$emit('triggerDeleteAll','{{ $key }}')" style="margin-bottom: 6px;margin-right: 15px" class="btn btn-warning" value="حذف همه کش ها">

                    <input style="margin-bottom: 30px !important" wire:model="key" id="key"
                           required type="text" name="search"
                           class="form-control rounded"
                           placeholder="کلید کش مورد نظر را وارد کنید">
                </div>
                <div class="col-lg-2">
                    <input type="button" {{ $status == false ? "disabled" : "" }} id="destroy" wire:click="$emit('triggerDelete','{{ $key }}')" style="margin-top: 40px" class="btn btn-danger" value="حذف">
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
                text: "آیا می خواهید این کش( cache ) حذف شود ؟ 🤔",
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

        @this.on('triggerDeleteAll', orderId => {
            Swal.fire({
                title: "هشدار ! ",
                icon: 'warning',
                text: "آیا می خواهید همه کش ها (caches) حذف شود ؟ 🤔",
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
                @this.call('DestroyAll')
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
