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
    showOnScroll(); // Запускаем проверку сразу
});

//Модальное окно

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModal');
    const closeModalBtn = document.getElementById('closeModal');

    if (openModalBtn && modal && closeModalBtn) {
        // Открыть модалку
        openModalBtn.addEventListener('click', e => {
            e.preventDefault();
            modal.style.display = 'flex'; // показываем
            document.body.style.overflow = 'hidden';
        });

        // Закрыть по крестику
        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        });

        // Закрыть при клике вне модалки
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
                    // Показать уведомление
                    const successPopup = document.getElementById('success-popup');
                    if (successPopup) {
                        successPopup.classList.add('show');
                        setTimeout(() => {
                            successPopup.classList.remove('show');
                        }, 4000);
                    }

                    // Закрыть модальное окно
                    const modal = document.getElementById('modal');
                    if (modal) {
                        modal.style.display = 'none';
                        document.body.style.overflow = '';
                    }

                    // Очистить форму
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

console.log('Submit обработан');

