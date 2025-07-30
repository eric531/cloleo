<script>

document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner tous les boutons "Ajouter au panier"
    const addToCartButtons = document.querySelectorAll('.button-add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Empêcher le comportement par défaut si nécessaire
            const url = this.getAttribute('data-url'); // URL de la requête (ex. "/cart/add/{productId}")
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ quantity: 1 }) // Ajustez selon vos besoins
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mettre à jour le compteur de produits
                    const cartCountElement = document.querySelector('.pro-count');
                    if (cartCountElement) {
                        cartCountElement.textContent = data.cartCount;
                    }
                    
                    // Mettre à jour le dropdown du panier
                    const cartDropdown = document.querySelector('.cart-dropdown-wrap');
                    if (cartDropdown && data.cartHtml) {
                        cartDropdown.innerHTML = data.cartHtml;
                    }
                    const countElement = document.getElementById('cart-count');
                    if (countElement) {
                        console.log('Mise à jour du compteur à', data.cartCount);
                        countElement.textContent = data.cartCount;
                    } else {
                        console.log('Élément du compteur non trouvé');
                    
                    }
                    
                    alert('Produit ajouté au panier !');
                } else {
                    alert('Erreur lors de l’ajout au panier.');
                }
            })
            .catch(error => {
                console.error('Erreur :', error);
                alert('Une erreur est survenue.');
            });
        });
    });
});
// document.addEventListener('DOMContentLoaded', function() {
//     const addToCartButtons = document.querySelectorAll('.button-add-to-cart');
    
//     addToCartButtons.forEach(button => {
//         button.addEventListener('click', function() {
//             const url = this.getAttribute('data-url');
            
//             fetch(url, {
//                 method: 'POST',
//                 headers: {
//                     'X-CSRF-TOKEN': '{{ csrf_token() }}', // Jeton CSRF pour Laravel
//                     'Content-Type': 'application/json'
//                 },
//                 body: JSON.stringify({ quantity: 1 }) // Données envoyées au serveur
//             })
//             .then(response => response.text()) // Récupérer la réponse sous forme de texte brut
//             .then(data => {
//                 console.log('Réponse brute du serveur :', data); // Pour déboguer
                
//                 // Vérifier si la réponse est vide ou invalide
//                 if (!data || data.trim() === '') {
//                     throw new Error('La réponse du serveur est vide ou invalide');
//                 }
                
//                 // Tenter de parser la réponse en JSON
//                 try {
//                     const parsedData = JSON.parse(data);
                    
//                     // Vérifier si la réponse contient un succès
//                     if (parsedData.success) {
//                         alert('Produit ajouté au panier avec succès !');
//                         updateCartCount(parsedData.cartCount); // Mettre à jour le compteur
//                     } else {
//                         alert('Erreur : ' + (parsedData.message || 'Impossible d\'ajouter le produit au panier'));
//                     }
//                 } catch (error) {
//                     console.error('Erreur lors du parsing JSON :', error);
//                     alert('Une erreur est survenue : la réponse du serveur n\'est pas valide.');
//                 }
//             })
//             .catch(error => {
//                 console.error('Erreur lors de la requête :', error);
//                 alert('Une erreur est survenue lors de l\'ajout au panier.');
//             });
//         });
//     });

//     // Fonction pour mettre à jour le compteur du panier
//     function updateCartCount(count) {
//         const cartCountElement = document.querySelector('#cart-count span');
//         if (cartCountElement) {
//             cartCountElement.textContent = count;
//         }
//     }
// });
    </script>