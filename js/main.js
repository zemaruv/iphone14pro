document.documentElement.classList.remove('no-js');



 // Анимация при загрузке
document.addEventListener('DOMContentLoaded', () => {
    
    const fadeInElements = document.querySelectorAll('.fade-in');
    fadeInElements.forEach(el => {
        el.classList.add('visible');
    });

// Анимация при скролле
    const fadeScrollElements = document.querySelectorAll('.fade-in-scroll');

    const showOnScroll = () => {
        const windowHeight = window.innerHeight;
        fadeScrollElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < windowHeight - 100) {
                el.classList.add('visible');
            }
        });
    };

    window.addEventListener('scroll', showOnScroll);
    showOnScroll(); 
});

//Модальное окно

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');

    if (openModalBtn && modal && closeModalBtn) {
        
        openModalBtn.addEventListener('click', e => {
            e.preventDefault();
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });

       
        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });

 
        window.addEventListener('click', e => {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    }
});


// Отправка данных на телеграм
document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form[data-form="tg"]');

    forms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();

            const formData = new FormData(form);

            fetch('send.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.text())
            .then(result => {
                if (result.trim() === 'success') {
                    
                    const successPopup = document.getElementById('success-popup');
                    if (successPopup) {
                        successPopup.classList.add('show');
                        setTimeout(() => {
                            successPopup.classList.remove('show');
                        }, 4000);
                    }

                    const modal = document.getElementById('modal');
                    if (modal) {
                        modal.style.display = 'none';
                        document.body.style.overflow = '';
                    }

                    
                    form.reset();
                } else {
                    alert('Ошибка отправки!');
                }
            })
            .catch(err => {
                alert('Ошибка!');
                console.error(err);
            });
        });
    });
});

// Мобильное меню

document.addEventListener('DOMContentLoaded', () => {
  const menuBtn = document.querySelector('.menu-btn');
  const mobileMenu = document.getElementById('mobileMenu');
  const closeBtn = mobileMenu.querySelector('.close-btn'); 

  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('open');
    });
  }

  if (closeBtn && mobileMenu) {
    closeBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
    });
  }
});

 //Scroll

 const modal = document.getElementById('modal');
const successPopup = document.getElementById('successPopup');

function openModal() {
  modal.style.display = 'flex';
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  modal.style.display = 'none';
  document.body.style.overflow = '';
}

function openPopup() {
  successPopup.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closePopup() {
  successPopup.classList.remove('open');
  document.body.style.overflow = '';
}


console.log('Submit обработан');

