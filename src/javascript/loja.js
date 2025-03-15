document.addEventListener("DOMContentLoaded", function() {
  var cart = []; // Inicializando o carrinho
  const cartTableBody = document.querySelector(".cart-table tbody");
  const cartTotalSpan = document.querySelector(".cart-total-container span");
  const cartBadge = document.getElementById("cart-count-badge");
  const addToCartButtons = document.querySelectorAll(".dish .button-hover-background");

  // Função para atualizar o carrinho
  function updateCart() {
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
  }

  // Função para adicionar produto ao carrinho
  function addToCart(name, price, image) {
    const existingItem = cart.find(item => item.name === name);

    if (existingItem) {
      existingItem.quantity++;
    } else {
      cart.push({ name, price, image, quantity: 1 });
    }
    updateCart();
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

  // Função para lidar com os eventos de incremento e decremento de quantidade
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

    updateCart();
  });

  // Função de compra
  window.makePurchase = function () {
    if (cart.length === 0) {
      alert("Seu carrinho está vazio!");
      return;
    }

    alert("Compra realizada com sucesso!");
    cart = [];
    updateCart();
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
});

// Função para limpar o carrinho
function clearCart() {
  // Remove o carrinho do localStorage
  localStorage.removeItem('cart');
  
  // Atualiza a exibição do carrinho
  updateCart();
  
  // Exibe uma mensagem informando que o carrinho foi limpo
  alert('Carrinho limpo!');
}

// Função para adicionar item ao carrinho
function addToCart(button) {
  const productName = button.getAttribute('data-product');
  const productPrice = button.parentElement.querySelector('.product-price').textContent;
  
  // Verifica se o carrinho já existe no localStorage
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Adiciona o item ao carrinho
  const item = {
      name: productName,
      price: productPrice,
      quantity: 1
  };

  // Verifica se o item já existe no carrinho
  const existingItem = cart.find(item => item.name === productName);
  if (existingItem) {
      existingItem.quantity += 1; // Se já existe, aumenta a quantidade
  } else {
      cart.push(item); // Caso contrário, adiciona como novo item
  }

  // Atualiza o carrinho no localStorage
  localStorage.setItem('cart', JSON.stringify(cart));

  // Atualiza o carrinho na página
  updateCart();
}

// Função para atualizar a exibição do carrinho
function updateCart() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const cartTableBody = document.querySelector('.cart-table tbody');
  const cartTotal = document.querySelector('.cart-total-container span');
  let total = 0;

  // Limpa o conteúdo da tabela do carrinho
  cartTableBody.innerHTML = '';

  // Preenche a tabela com os itens do carrinho
  cart.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
          <td class="first-col">${item.name}</td>
          <td class="second-col">${item.price}</td>
          <td class="third-col">${item.quantity}</td>
      `;
      cartTableBody.appendChild(row);

      // Calcula o total
      total += parseFloat(item.price.replace('R$', '').replace(',', '.')) * item.quantity;
  });

  // Exibe o total no carrinho
  cartTotal.textContent = `R$${total.toFixed(2).replace('.', ',')}`;
}

// Função para finalizar a compra
function makePurchase() {
  localStorage.removeItem('cart'); // Limpa o carrinho após a compra
  alert('Compra finalizada com sucesso!');
  updateCart(); // Atualiza o carrinho (para mostrar vazio após a compra)
}

// Atualiza o carrinho quando a página carrega
document.addEventListener('DOMContentLoaded', updateCart);
