// Mobile Menu Toggle
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

if (hamburger) {
  hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
  });

  // Close menu when link is clicked
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', () => {
      navMenu.classList.remove('active');
    });
  });
}

// Form Validation
function validateForm(form) {
  let isValid = true;
  const fields = form.querySelectorAll('input, textarea, select');

  fields.forEach(field => {
    if (field.hasAttribute('required') && field.value.trim() === '') {
      field.classList.add('error');
      isValid = false;
    } else {
      field.classList.remove('error');
    }
  });

  return isValid;
}

// Email Validation
function isValidEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

// Phone Validation
function isValidPhone(phone) {
  const re = /^[\d\s\-\+\(\)]{10,}$/;
  return re.test(phone);
}

// Format Currency
function formatCurrency(amount) {
  return '$' + parseFloat(amount).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

// Add to Cart (if applicable)
function addToCart(productId) {
  // This would be implemented based on your cart system
  console.log('Added product ' + productId + ' to cart');
}

// Delete confirmation
function confirmDelete(message = 'Are you sure you want to delete this item?') {
  return confirm(message);
}

// Show loading spinner
function showLoading() {
  document.body.style.opacity = '0.6';
  document.body.style.pointerEvents = 'none';
}

// Hide loading spinner
function hideLoading() {
  document.body.style.opacity = '1';
  document.body.style.pointerEvents = 'auto';
}

// Alert notification
function showAlert(message, type = 'success') {
  const alertDiv = document.createElement('div');
  alertDiv.className = 'alert alert-' + type;
  alertDiv.innerHTML = '<span>' + message + '</span>';
  
  const container = document.querySelector('.container') || document.body;
  container.insertBefore(alertDiv, container.firstChild);
  
  setTimeout(() => {
    alertDiv.style.display = 'none';
  }, 5000);
}

// Date formatting
function formatDate(dateString) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString('en-US', options);
}

// Time formatting
function formatTime(timeString) {
  return new Date('2000-01-01 ' + timeString).toLocaleTimeString('en-US', { 
    hour: '2-digit', 
    minute: '2-digit' 
  });
}