<?php

namespace App\Http\Livewire\Admin\TrashCategories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListTrashCategory extends Component
{
    use WithPagination;

    public $titlePage = '';
    public $pagination  = 5;
    public $search = '';

    protected $categories = [];

    private function Searching()
    {
        return Category::where('title' , 'like' , '%' . $this->search . '%' )
            ->where('is_remove' , 1)->latest()->paginate($this->pagination);
    }

    public function restore(Category $category)
    {
        $category->update(['is_remove' => 0]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }

    private function selectTrashCategories(): void
    {
        $this->categories = $this->search != '' ? $this->Searching()
            : Category::where('is_remove', 1)->latest()->paginate($this->pagination);
    }

    public function render()
    {
        $this->selectTrashCategories();
        return view('livewire.admin.trash-categories.list-trash-category' , ['categories' => $this->categories]);
    }
}
