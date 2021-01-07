<hr>

<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="search" style="margin-right: 15px !important;">جستجو</label>
            <input style="margin-bottom: 30px !important" wire:model.debounce.400="search" id="search"
                   required type="text" name="search"
                   class="form-control rounded"
                   placeholder="کلمه مورد نظر را وارد کنید">
        </div>
        <div class="col-lg-2">
            <label class="control-label col-lg-2">نتایج</label>
            <select wire:model="pagination" class="form-control rounded">
                <option>5</option>
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
        </div>
    </div>
</div>
