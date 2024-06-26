<?php

namespace App\Livewire;

use App\Livewire\Forms\ManagerForm;
use App\Livewire\Forms\ProductForm;
use App\Models\Category;
use App\Models\Manager;
use App\Models\Product;
use App\Models\Season;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ProductMain extends Component{
    use WithPagination;

    public $isOpen=false;
    public $position_id;
    public ?Product $product;
    public ProductForm $form;
    public $search;

    // public function mount($id){
    //     $this->position_id=$id;
    //     $this->form->mount($id);
    // }

    public function render(){
        $products=Product::where('name','LIKE','%'.$this->search.'%')->latest('id')->paginate(10);
        $categories=Category::all();
        return view('livewire.product-main',compact('products','categories'));
    }

    public function create(){
        $this->isOpen=true;
        $this->form->reset();
        $this->reset(['product']);
        $this->resetValidation();
        //$this->form->mount($this->supplier_id);
    }

    public function edit(Product $product){
        //dd($vehicle);
        $this->product=$product;
        $this->form->fill($product);
        $this->isOpen=true;
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        if(!isset($this->product->id)){
            Product::create($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro creado'
            );
        }else{
            $this->product->update($this->form->all());
            $this->dialog()->success(
                $title = 'Mensaje del sistema',
                $description = 'Registro actualizado'
            );
        }
        $this->reset(['isOpen']);
    }

    public function destroy(Product $product){
        $product->delete();
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
