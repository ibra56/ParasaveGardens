<?php

namespace App\Livewire\Website;

use Livewire\Component;
use App\Models\GalleryItem;
use Livewire\WithFileUploads;

class ManageGallery extends Component
{
    use WithFileUploads;

    public $title;
    public $type;
    public $path;
    public $galleryItems;

    // Validation rules
    protected $rules = [
        'title' => 'sometimes|nullable|string|max:255',
        'type' => 'required|in:image,video',
        'path' => 'required|file|max:5000',
    ];

    public function mount()
    {
        $this->loadGalleryItems();
    }

    public function loadGalleryItems()
    {
        $this->galleryItems = GalleryItem::all();
    }

    public function addGalleryItem()
    {
        $this->validate();

        $file_path = $this->path->store('gallery', 'public');

        GalleryItem::create([
            'title' => $this->title,
            'type' => $this->type,
            'path' => $file_path,
        ]);

        // Clear the form
        $this->resetForm();

        // Reload gallery items
        $this->loadGalleryItems();
    }

    public function deleteGalleryItem($id)
    {
        GalleryItem::findOrFail($id)->delete();

        // Reload gallery items
        $this->loadGalleryItems();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->type = '';
        $this->path = '';
    }

    public function render()
    {
        return view('livewire.website.manage-gallery');
    }
}
