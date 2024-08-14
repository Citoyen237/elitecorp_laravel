<?php

namespace App\Livewire\Front;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Panier extends Component
{
    public $cart;

    public function mount()
    {
        // Récupère ou crée un panier pour l'utilisateur connecté
        $this->cart = Cart::with('items.spack')->firstOrCreate(['user_id' => Auth::id()]);
    }

    public function removeItem($itemId)
    {
        // Trouve l'élément du panier par son ID
        $cartItem = CartItem::where('id', $itemId)->first();

        if ($cartItem) {
            // Supprime l'élément du panier
            $cartItem->delete();

            // Rafraîchit le panier
            $this->cart->refresh();

            session()->flash('success', 'Produit supprimé du panier !');
        }
    }

    public function getTotalProperty()
    {
        // Calcule le total du panier
        return $this->cart->items->sum(function ($item) {
            return $item->quantity * $item->spack->prix;
        });
    }

    public function validateOrder()
    {
        $this->cart->load('items.spack');

        // Créer une nouvelle commande
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $this->cart->items->sum(function ($item) {
                return $item->quantity * $item->spack->prix;
            }),
            // autres colonnes nécessaires
        ]);

        // Copier les éléments du panier dans la commande
        foreach ($this->cart->items as $item) {
            $expiration_date = Carbon::now()->addMonths($item->spack->duree);
            OrderItem::create([
                'order_id' => $order->id,
                'spack_id' => $item->spack_id,
                'quantity' => $item->quantity,
                'price' => $item->spack->prix,
                'expiration_date' => $expiration_date,
            ]);
        }

        // Effacer le panier
        $this->cart->items()->delete();
        $this->cart->delete();

        // Rafraîchir le composant
        $this->cart = null;
        return redirect()->route('abonnement.mes-abonnement');
        // session()->flash('success', 'Commande validée avec succès et panier effacé !');
    }

    public function render()
    {
        return view('livewire.front.panier', [
            'cart' => $this->cart,
            'total' => $this->getTotalProperty(),
        ]);
    }
}
