document.addEventListener("DOMContentLoaded", function() {
  const cartTableBody = document.querySelector(".cart-table tbody");
  const cartTotalSpan = document.querySelector(".cart-total-container span");
  const cartBadge = document.getElementById("cont-balao");
  const addToCartButtons = document.querySelectorAll(".dish .button-hover-background");

  // Função para atualizar o carrinho
  function updateCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    cartTableBody.innerHTML = "";
    let total = 0;
    let totalItems = 0;

    cart.forEach((item, index) => {
      total += item.price * item.quantity;
      totalItems += item.quantity;

      const row = document.createElement("tr");
      row.innerHTML = `
        <td class="cart-item">
          <img src="${item.image}" alt="${item.name}" class="cart-item-image">
          <span>${item.name}</span>
        </td>
        <td>R$${item.price.toFixed(2)}</td>
        <td>
          <button class="decrease-quantity" data-index="${index}">-</button>
          <span>${item.quantity}</span>
          <button class="increase-quantity" data-index="${index}">+</button>
          <button class="remove-item" data-index="${index}">🗑️</button>
        </td>
      `;
      cartTableBody.appendChild(row);
    });

    cartTotalSpan.textContent = `R$${total.toFixed(2)}`;
    cartBadge.textContent = totalItems;
    cartBadge.style.display = totalItems > 0 ? "inline-block" : "none";

    // Adiciona os eventos de clique para os botões de incremento, decremento e remoção
    cartTableBody.addEventListener("click", function (event) {
      const index = event.target.dataset.index;
      if (event.target.classList.contains("increase-quantity")) {
        cart[index].quantity++;
      } else if (event.target.classList.contains("decrease-quantity")) {
        cart[index].quantity--;
        if (cart[index].quantity === 0) {
          cart.splice(index, 1);
        }
      } else if (event.target.classList.contains("remove-item")) {
        cart.splice(index, 1);
      }

      // Atualiza o carrinho no localStorage após a alteração
      localStorage.setItem('cart', JSON.stringify(cart));
      updateCart(); // Atualiza a exibição do carrinho
    });
  }

  // Função para adicionar produto ao carrinho
  function addToCart(name, price, image) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
      existingItem.quantity++;
    } else {
      cart.push({ name, price, image, quantity: 1 });
    }

    // Atualiza o carrinho no localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    updateCart(); // Atualiza a exibição do carrinho
    showNotification(name, 'adicionado');
  }

  // Função para mostrar a notificação personalizada
  function showNotification(productName, action) {
    const notification = document.getElementById("notification");
    if (action === 'adicionado') {
      notification.textContent = `${productName} foi adicionado ao carrinho!`;
    } else if (action === 'removido') {
      notification.textContent = `${productName} foi removido do carrinho!`;
    }
    notification.classList.add('show');
    setTimeout(() => {
      notification.classList.remove('show');
    }, 3000); // Notificação desaparece após 3 segundos
  }

  // Função de compra
  window.makePurchase = function () {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length === 0) {
      alert("Seu carrinho está vazio!");
      return;
    }

    alert("Compra realizada com sucesso!");
    localStorage.removeItem('cart'); // Limpa o carrinho após a compra
    updateCart(); // Atualiza a exibição do carrinho
  };

  // Adicionando os produtos ao carrinho
  addToCartButtons.forEach(button => {
    button.addEventListener("click", function () {
      const dishElement = this.closest(".dish");
      const name = dishElement.querySelector(".product-title").textContent;
      const priceText = dishElement.querySelector(".product-price").textContent.replace("R$", "").replace(",", ".");
      const price = parseFloat(priceText);
      const image = dishElement.querySelector(".product-image").src;

      addToCart(name, price, image);
    });
  });

  // Atualiza o carrinho quando a página carrega
  updateCart();
});

// Função para limpar o carrinho
function clearCart() {
  localStorage.removeItem('cart'); // Remove o carrinho do localStorage
  updateCart(); // Atualiza a exibição do carrinho
  alert('Carrinho limpo!');
}
