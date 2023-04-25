<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ImageView extends Component
{

    public $image, $alt, $className, $style, $width, $height, $src;

    public function mount()
    {
        if (!$this->className) {
            $this->className = 'image-fluid fixed-size-sm';
        }

        
        if ($this->image) {
            if (filter_var($this->image, FILTER_VALIDATE_URL)) {
                $this->src = $this->image;
            } elseif ($this->image) {
                $this->src = asset('storage/' . $this->image);
            } else {
                $this->src = asset('images/no-photo.svg');
            }
        } else {
            $this->src = asset('images/no-photo.svg');
        }
    }

    public function render()
    {
        return view('livewire.components.image-view');
    }
}
