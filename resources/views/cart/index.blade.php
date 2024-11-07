@extends('layouts.app')

@section('title', 'Panier')

@section('content')
<style>
    /* Styliser les cases à cocher pour ressembler à des cercles */
    .select-item,
    #select-all {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    .select-item[type="checkbox"],
    #select-all[type="checkbox"] {
        appearance: none;
        border: 2px solid #555;
        background-color: #fff;
        outline: none;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }

    .select-item[type="checkbox"]:checked,
    #select-all[type="checkbox"]:checked {
        background-color: #000;
        border-color: #000;
    }

    .select-item[type="checkbox"]:checked::before,
    #select-all[type="checkbox"]:checked::before {
        content: '✔';
        color: #fff;
        font-size: 12px;
    }

    /* Amélioration de la présentation du bouton J'achète */
    .purchase-section {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin-top: 20px;
    }

    /* Style pour le conteneur du prix total et du bouton */
    .total-and-purchase {
        display: flex;
        align-items: center;
    }

    /* Alignement du prix total et bouton achat ensemble */
    .total-price {
        margin-right: 20px; /* Espace entre le prix et le bouton */
        font-size: 18px;
        font-weight: bold;
    }

    .btn-purchase {
        font-size: 18px;
        padding: 10px 20px;
        color: #fff;
        background-color: #28a745;
        border: none;
        cursor: pointer;
    }

    .btn-purchase:hover {
        background-color: #218838;
    }
</style>

<div class="container mt-5">
    <h1>Mon Panier</h1>

    @if(session('cart') && count(session('cart')) > 0)
        <!-- Case à cocher pour sélectionner/désélectionner tous les produits -->
        <div class="mb-3">
            <input type="checkbox" id="select-all" onclick="toggleAll()" checked /> Tout
        </div>

        @foreach(session('cart') as $id => $details)
        <div class="cart-item d-flex align-items-center mb-4">
            <!-- Case à cocher individuelle pour chaque produit -->
            <input type="checkbox" class="select-item" data-id="{{ $id }}" checked onchange="checkIndividualSelection()" />

            <!-- Image du produit -->
            <div class="cart-item-image">
                <img src="{{ asset($details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid" style="width: 100px;">
            </div>

            <!-- Détails du produit -->
            <div class="cart-item-details ms-3">
                <h5>{{ $details['name'] }}</h5>
                <p class="text-muted">{{ number_format($details['price'], 0, ',', ' ') }} FCFA</p>
                
                <!-- Contrôles de quantité avec "+" "-" uniquement -->
                <div class="quantity-control d-flex align-items-center mt-3">
                    <!-- Bouton pour diminuer la quantité -->
                    <form action="{{ route('cart.update', $id) }}" method="POST" class="quantity-update-form">
                        @csrf
                        @method('PATCH')
                        <button type="button" onclick="updateQuantity('{{ $id }}', {{ $details['quantity'] - 1 }})" class="btn btn-outline-secondary btn-sm me-2">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span class="quantity">{{ $details['quantity'] }}</span>
                        <button type="button" onclick="updateQuantity('{{ $id }}', {{ $details['quantity'] + 1 }})" class="btn btn-outline-secondary btn-sm ms-2">
                            <i class="fas fa-plus"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Supprimer l'article -->
            <div class="ms-auto">
                <form action="{{ route('cart.remove', $id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
        @endforeach

        <!-- Total et bouton "J'achète" -->
        <div class="purchase-section">
            <div class="total-and-purchase">
                <span class="total-price">Total : <span id="cart-total">{{ number_format(collect(session('cart'))->sum(fn($details) => $details['quantity'] * $details['price']), 0, ',', ' ') }} FCFA</span>
                <button class="btn btn-purchase" onclick="purchase()">J'achète</button>
            </div>
        </div>
    @else
        <p>Votre panier est vide.</p>
    @endif
</div>

<script>
    // Fonction pour gérer la sélection/désélection de tous les produits
    function toggleAll() {
        let selectAllCheckbox = document.getElementById('select-all');
        let checkboxes = document.querySelectorAll('.select-item');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
        updateTotal();
    }

    // Fonction pour mettre à jour la quantité et recalculer le total
    function updateQuantity(id, newQuantity) {
        if (newQuantity < 1 || newQuantity > 20) return;

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `{{ url('/cart/update') }}/${id}`;
        form.innerHTML = `
            @csrf
            @method('PATCH')
            <input type="hidden" name="quantity" value="${newQuantity}">
        `;
        document.body.appendChild(form);
        form.submit();
    }

    // Fonction pour calculer et mettre à jour le total
    function updateTotal() {
        let total = 0;
        let checkboxes = document.querySelectorAll('.select-item:checked');
        checkboxes.forEach(checkbox => {
            let id = checkbox.dataset.id;
            let quantity = document.querySelector(`[data-id="${id}"]`).closest('.cart-item').querySelector('.quantity').textContent;
            let price = parseFloat(document.querySelector(`[data-id="${id}"]`).closest('.cart-item').querySelector('.text-muted').textContent.replace(/[^\d]/g, ''));
            total += price * quantity;
        });
        document.getElementById('cart-total').textContent = total.toLocaleString('fr-FR') + ' FCFA';
    }

    // Fonction pour vérifier la sélection individuelle et décocher "Tout" si un produit est décoché
    function checkIndividualSelection() {
        let selectAllCheckbox = document.getElementById('select-all');
        let checkboxes = document.querySelectorAll('.select-item');
        let allChecked = true;
        
        checkboxes.forEach(checkbox => {
            if (!checkbox.checked) {
                allChecked = false;
            }
        });

        selectAllCheckbox.checked = allChecked;
        updateTotal();
    }

    // Fonction pour gérer l'achat
    function purchase() {
        let selectedItems = [];
        let checkboxes = document.querySelectorAll('.select-item:checked');
        checkboxes.forEach(checkbox => {
            selectedItems.push(checkbox.dataset.id);
        });

        if (selectedItems.length > 0) {
            alert('Produits sélectionnés : ' + selectedItems.join(', '));
        } else {
            alert('Veuillez sélectionner au moins un produit à acheter.');
        }
    }

    document.addEventListener('DOMContentLoaded', updateTotal);
</script>
@endsection
