<?php

namespace App\Http\Livewire\Admin\Settings\SettingsTab;

use App\Models\CompanyDocuments;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;


class SettingsTab2 extends Component
{
    use WithFileUploads;

    public CompanyProfile $company_profile;
    public $documents = [];
    public $document_copy = [];
    
    protected $rules = [
        // * Documents
        'documents.*.name' => 'required|string',
        'documents.*.filename' => 'required|mimes:pdf,doc,docx,xml|mimetypes:application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];

    protected $messages = [
        'documents.*.name.required' => 'The name field is required',
        'documents.*.name.string' => 'The name field must be string',
        'documents.*.filename.required' => 'The file field is required',
        'documents.*.filename.mimes' => 'The file must be a file of type: pdf, doc, docx, xml',
        'documents.*.filename.mimetypes' => 'The file must be a file of type: application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    ];
   
    public function mount()
    {
        $from_db = CompanyProfile::first();
         
        if ($from_db){
            $this->company_profile = $from_db;
            
        } else {
            $this->company_profile = new CompanyProfile();
        }

        foreach($this->company_profile->documents as $document)
        {
            $this->documents[] = $document;
        }

        //var_dump($this->documents);
        $this->document_copy = $this->documents;
    }

    public function addDocument()
    {
        $this->documents[] = new CompanyDocuments();

        session()->flash('success', 'New document form added.');
    }

    public function removeDocument($index)
    {
        if (isset($this->documents[$index])) {
            unset($this->documents[$index]);
        }

        session()->flash('success', 'Document removed successfully.');
    }

    public function updateCompanyDocuments()
    {
        $this->validate();

        //dd($this->documents);
        // get what's deleted in form
        $differences = array_udiff($this->document_copy, $this->documents, function ($a, $b) {
            //dd($a, $b);
            return strcmp(serialize(Arr::except($a, ['filename'])), serialize(Arr::except($b, ['filename'])));
        });

        dd($differences);

        if($differences)
        {
            foreach($differences as $selected_item)
            {
                if(array_key_exists('id', $selected_item))
                {
                    // Delete deleted form from documents array
                    $this->company_profile->documents->find($selected_item['id'])->delete();

                    if(File::exists(public_path('storage/'.$selected_item['filename'])))
                    {
                        File::delete(public_path('storage/'.$selected_item['filename']));
                    }
                } 
            }
        }

        //* Save newly input documents
        foreach ($this->documents as $document) {
            
            if(!File::exists(public_path('storage/'.$document['filename'])) == $document['filename'])
            {
                File::delete(public_path('storage/'.$document['filename']));
            }

            $filename = $document->store('documents/uploads/', 'public');
            
            $this->company_profile->documents()->updateOrCreate([
                'name' => $document['name'],
                'filename' => $filename,
            ]);

        }       
    }

    public function updated($property)
    {
        $this->validateOnly($property);   
    }

    public function hide()
    {   
        if (session()->has('error')) {
            session()->forget('error');
        }

        if (session()->has('success')) {
            session()->forget('success');
        }
    }

    public function render()
    {
        return view('livewire.admin.settings.settings-tab.settings-tab2');
    }
}
