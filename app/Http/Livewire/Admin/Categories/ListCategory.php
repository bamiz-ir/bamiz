<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination = 5;
    protected $categories = [];
    public $search = '';

    public function Searching()
    {
        return Category::where(function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('slug', 'like', '%' . $this->search . '%');
        })
            ->where('is_remove', 0)
            ->latest()->paginate($this->pagination);
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search' || $propertyName == 'pagination')
        {
            $this->resetPage();
        }
    }

    public function destroy(Category $category)
    {
        Category::query()
            ->where('chid' , $category->id)
            ->update(['is_remove' => 1]);

        $category->update(['is_remove' => 1]);
    }

    private function selectCategories(): void
    {
        $this->categories = $this->search != ''
            ? $this->Searching()
            : Category::where('is_remove', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectCategories();
        return view('livewire.admin.categories.list-category', ['categories' => $this->categories]);
    }

}
