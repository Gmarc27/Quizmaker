const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLoginPopup');
const closeIcon = document.querySelector('.form-box.register .fa-xmark');
const closeIcon1 = document.querySelector('.form-box.login .fa-xmark');
const closeIcon2 = document.querySelector('.form-box.contact .fa-xmark');
const contact = document.querySelector('.contact');

registerLink.addEventListener('click', () => {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
  wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () => {
  wrapper.classList.add('active-popup');
});

btnPopup.addEventListener('click', () => {
  wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', () => {
  wrapper.classList.remove('active-contact');
});

contact.addEventListener('click', () => {
  wrapper.classList.add('active-contact');
});

contact.addEventListener('click', () => {
  wrapper.classList.add('active-popup');
});

contact.addEventListener('click', () => {
  wrapper.classList.remove('active');
});


closeIcon.addEventListener('click', () => {
  wrapper.classList.remove('active-popup');
});

closeIcon1.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
  });

  closeIcon2.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
  });