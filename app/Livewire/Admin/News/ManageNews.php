<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class ManageNews extends Component
{
    use WithPagination;

    public $title = '';
    public $excerpt = '';
    public $content = '';
    public $category = 'anmalan';
    public $is_featured = false;
    public $is_published = false;
    public $editingId = null;

    public $showModal = false;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'excerpt' => 'required|min:10|max:500',
        'content' => 'required|min:20',
        'category' => 'required|in:anmalan,datum,höjdpunkter,allmänt',
    ];

    public function mount()
    {
        // Kontrollera behörighet
        if (!auth()->user()->canManageMatches()) {
            abort(403, 'Obehörig åtkomst');
        }
    }

    public function render()
    {
        $news = News::with('author')
            ->latest('created_at')
            ->paginate(10);

        return view('livewire.admin.news.manage-news', [
            'newsList' => $news,
        ]);
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->resetForm();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->editingId = null;
        $this->title = '';
        $this->excerpt = '';
        $this->content = '';
        $this->category = 'anmalan';
        $this->is_featured = false;
        $this->is_published = false;
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'category' => $this->category,
            'is_featured' => $this->is_featured,
            'is_published' => $this->is_published,
            'author_id' => auth()->id(),
        ];

        if ($this->is_published) {
            $data['published_at'] = now();
        }

        if ($this->editingId) {
            $news = News::findOrFail($this->editingId);
            $news->update($data);
            session()->flash('message', 'Nyheten har uppdaterats!');
        } else {
            News::create($data);
            session()->flash('message', 'Nyheten har skapats!');
        }

        $this->closeModal();
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        $this->editingId = $news->id;
        $this->title = $news->title;
        $this->excerpt = $news->excerpt;
        $this->content = $news->content;
        $this->category = $news->category;
        $this->is_featured = $news->is_featured;
        $this->is_published = $news->is_published;

        $this->showModal = true;
    }

    public function delete($id)
    {
        News::findOrFail($id)->delete();
        session()->flash('message', 'Nyheten har raderats!');
    }

    public function togglePublished($id)
    {
        $news = News::findOrFail($id);
        $news->update([
            'is_published' => !$news->is_published,
            'published_at' => !$news->is_published ? now() : $news->published_at,
        ]);
        session()->flash('message', 'Status uppdaterad!');
    }
}
