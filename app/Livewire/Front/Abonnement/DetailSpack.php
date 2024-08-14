<?php

namespace App\Livewire\Front\Abonnement;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Spack;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailSpack extends Component
{
    public $spack;
    public $spackId, $cart;
    public $quantity = 1;


    public function mount()
    {
        // Obtient ou crée un panier pour l'utilisateur connecté
        $this->cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    }

    public function addToCart($spackId)
    {
        // Trouver le produit par son ID
        $spack = Spack::findOrFail($spackId);

        // Chercher l'élément du panier ou le créer si nécessaire
        $cartItem = CartItem::where('cart_id', $this->cart->id)
                            ->where('spack_id', $spackId)
                            ->first();

        if ($cartItem) {
            // Si l'élément est déjà dans le panier, augmenter la quantité
            $cartItem->quantity += $this->quantity;
            $cartItem->save();
        } else {
            // Sinon, créer un nouvel élément de panier
            $cartItem = new CartItem();
            $cartItem->cart_id = $this->cart->id;
            $cartItem->spack_id = $spackId;
            $cartItem->quantity = $this->quantity;
            $cartItem->save();
        }

        // // Émettre un événement pour mettre à jour les autres parties de l'application
        // $this->emit('cartUpdated');

        // Rediriger vers la même page produit avec un message de succès
        return redirect(route('cart'))->back()->with('success', 'abonnement ajouté au panier !');
    }

    public function render()
    {
        return view('livewire.front.abonnement.detail-spack',[
            'spack'=>Spack::findOrFail($this->spack->id)
        ]);
    }
}
