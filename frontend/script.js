document.addEventListener("DOMContentLoaded", function() {
    const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');
        });
    });

    const toggleSwitch = document.getElementById('darkModeToggle');
    const illustrationWrapper = document.getElementById('illustration-wrapper');
    const logo = document.getElementById('logo');
    const flameGif = document.querySelector('.flame-gif');
    const rainDay = document.querySelector('.rain-day-gif');
    const rainNight = document.querySelector('.rain-night-gif');

    let themeableContainer;

    if (toggleSwitch) {
        let lightPicture, darkPicture, doorDay, doorNight, chairDay, chairNight, tvDay, tvNight, libraryDay, libraryNight;

        if (illustrationWrapper) {
            lightPicture = illustrationWrapper.querySelector('.light-mode-picture');
            darkPicture = illustrationWrapper.querySelector('.dark-mode-picture');
            doorDay = illustrationWrapper.querySelector('.door-day');
            doorNight = illustrationWrapper.querySelector('.door-night');
            chairDay = illustrationWrapper.querySelector('.chair-day');
            chairNight = illustrationWrapper.querySelector('.chair-night');
            tvDay = illustrationWrapper.querySelector('.tv-day');
            tvNight = illustrationWrapper.querySelector('.tv-night');
            libraryDay = illustrationWrapper.querySelector('.library-day');
            libraryNight = illustrationWrapper.querySelector('.library-night');
        }

        const applyDarkMode = () => {
            document.body.classList.add('dark-mode');
            toggleSwitch.checked = true;

            if (lightPicture && darkPicture) {
                lightPicture.style.display = 'none';
                darkPicture.style.display = 'block';
            }

            if (doorDay && doorNight) {
                doorDay.classList.remove('active');
                doorNight.classList.add('active');
            }

            if (logo) {
                logo.src = logo.getAttribute('data-dark-logo');
            }

            if (chairDay && chairNight) {
                chairDay.classList.remove('active');
                chairNight.classList.add('active');
            }
            if (tvDay && tvNight) {
                tvDay.classList.remove('active');
                tvNight.classList.add('active');
            }
            if (libraryDay && libraryNight) {
                libraryDay.classList.remove('active');
                libraryNight.classList.add('active');
            }

            if (flameGif) {
                flameGif.style.display = 'block';
            }

            if (rainDay && rainNight) {
                rainDay.style.display = 'none';
                rainNight.style.display = 'block';
            }

            if (themeableContainer) {
                themeableContainer.loadTheme("dark");
            }
        };

        const applyLightMode = () => {
            document.body.classList.remove('dark-mode');
            toggleSwitch.checked = false;

            if (lightPicture && darkPicture) {
                lightPicture.style.display = 'block';
                darkPicture.style.display = 'none';
            }

            if (doorDay && doorNight) {
                doorDay.classList.add('active');
                doorNight.classList.remove('active');
            }

            if (logo) {
                logo.src = logo.getAttribute('data-light-logo');
            }

            if (chairDay && chairNight) {
                chairDay.classList.add('active');
                chairNight.classList.remove('active');
            }

            if (tvDay && tvNight) {
                tvDay.classList.add('active');
                tvNight.classList.remove('active');
            }

            if (libraryDay && libraryNight) {
                libraryDay.classList.add('active');
                libraryNight.classList.remove('active');
            }

            if (flameGif) {
                flameGif.style.display = 'none';
            }

            if (rainDay && rainNight) {
                rainDay.style.display = 'block';
                rainNight.style.display = 'none';
            }

            if (themeableContainer) {
                themeableContainer.loadTheme("light");
            }
        };

        if (localStorage.getItem('darkMode') === 'enabled') {
            applyDarkMode();
        } else {
            applyLightMode();
        }

        toggleSwitch.addEventListener('change', () => {
            if (toggleSwitch.checked) {
                localStorage.setItem('darkMode', 'enabled');
                applyDarkMode();
            } else {
                localStorage.setItem('darkMode', 'disabled');
                applyLightMode();
            }
        });

        tsParticles
            .load("tsparticles", {
                fpsLimit: 60,
                particles: {
                    move: {
                        bounce: false,
                        direction: "none",
                        enable: true,
                        outModes: "out",
                        random: false,
                        speed: 0.5,
                        straight: false
                    },
                    number: { density: { enable: true, area: 800 }, value: 80 },
                    opacity: {
                        value: 0.2
                    },
                    shape: {
                        type: "circle"
                    },
                    size: {
                        value: { min: 1, max: 3 }
                    }
                },
                themes: [
                    {
                        name: "light",
                        default: {
                            value: true,
                            mode: "light"
                        },
                        options: {
                            background: {
                                color: "#fff"
                            },
                            particles: {
                                color: {
                                    value: "#000"
                                }
                            }
                        }
                    },
                    {
                        name: "dark",
                        default: {
                            value: true,
                            mode: "dark"
                        },
                        options: {
                            background: {
                                color: "#000"
                            },
                            particles: {
                                color: {
                                    value: "#fff"
                                }
                            }
                        }
                    }
                ]
            })
            .then((container) => {
                themeableContainer = container;
                if (localStorage.getItem('darkMode') === 'enabled') {
                    applyDarkMode();
                } else {
                    applyLightMode();
                }
            });
    }

    // Random facts code (home page)
    if (currentPage === 'home') {
        const randomFactsDiv = document.querySelector('.random-facts');
        if (randomFactsDiv) {
            const fetchRandomFact = async () => {
                try {
                    console.log("Récupération d'un fait aléatoire...");
                    const response = await fetch('index.php?page=getRandomFact&t=' + new Date().getTime());
                    const fact = await response.json();
                    console.log("Fait récupéré :", fact);
                    document.querySelector('.fact-title').textContent = fact.title;
                    document.querySelector('.fact-content').textContent = fact.content;
                    document.querySelector('.fact-emoji').textContent = fact.emoji;
    
                    const factContentElement = document.querySelector('.fact-content');
                    factContentElement.classList.add('active');
                } catch (error) {
                    console.error("Erreur lors de la récupération du fait :", error);
                }
            };
    
            // Appeler la fonction pour récupérer un fait aléatoire au chargement de la page
            fetchRandomFact();
    
            // Mettre à jour les faits aléatoires toutes les 10 secondes
            setInterval(fetchRandomFact, 10000);
        }
    }

    if (currentPage === 'projects') {
        console.log('On projects page');

        const modal = document.querySelector('.modal');
        const modalBackground = document.querySelector('.modal-background');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalGithub = document.getElementById('modal-github');
        const modalDeployment = document.getElementById('modal-deployment');
        const modalScreenshot = document.getElementById('modal-screenshot');
        const closeModalButtons = document.querySelectorAll('.delete, .modal-close');

        const projectCards = document.querySelectorAll('.project-card');
        console.log('Found project cards:', projectCards.length);

        projectCards.forEach(card => {
            card.addEventListener('click', function() {
                console.log('Card clicked');

                modalTitle.textContent = this.getAttribute('data-title');
                modalDescription.textContent = this.getAttribute('data-description');
                modalGithub.href = this.getAttribute('data-github');
                modalDeployment.href = this.getAttribute('data-deployment');

                const screenshotSrc = this.getAttribute('data-screenshot');
                if (screenshotSrc) {
                    modalScreenshot.src = screenshotSrc;
                    modalScreenshot.style.display = 'block';
                } else {
                    modalScreenshot.style.display = 'none';
                }

                modal.classList.add('is-active');
            });
        });

        closeModalButtons.forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.remove('is-active');
            });
        });

        modalBackground.addEventListener('click', function() {
            modal.classList.remove('is-active');
        });
    }

    if (currentPage === 'about') {
        let barChart;

        fetch('index.php?page=getData')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(text => {
                console.log('Response text:', text);
                try {
                    const data = JSON.parse(text);
                    console.log(data);

                    new Chart(document.getElementById("pieChart"), {
                        type: 'doughnut',
                        data: {
                            labels: data.pieLabels,
                            datasets: [{
                                data: data.pieData,
                                backgroundColor: ["#D46B8C", "#8BD2BF", "#EC8E63", "#9BD0F5"]
                            }]
                        }
                    });

                    const createBarChart = () => {
                        const isMobileOrTablet = window.innerWidth <= 943;

                        if (barChart) {
                            barChart.destroy();
                        }

                        barChart = new Chart(document.getElementById("barChart"), {
                            type: 'bar',
                            data: {
                                labels: data.barLabels,
                                datasets: [{
                                    label: '',
                                    data: data.barData,
                                    backgroundColor: ["#D46B8C", "#8BD2BF", "#EC8E63", "#9BD0F5"]
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    x: {
                                        display: isMobileOrTablet,
                                        title: {
                                            display: isMobileOrTablet,
                                            text: 'Categories'
                                        }
                                    },
                                    y: {
                                        type: 'linear',
                                        beginAtZero: true,
                                        ticks: {
                                            callback: function(value) {
                                                if (value === 25) return 'Newbie';
                                                if (value === 50) return 'Geek';
                                                if (value === 75) return 'Expert';
                                                if (value === 100) return 'God Mode';
                                                return '';
                                            },
                                            stepSize: 25,
                                            max: 100
                                        },
                                        title: {
                                            display: true,
                                            text: 'Level'
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    datalabels: {
                                        display: !isMobileOrTablet,
                                        anchor: 'center',
                                        align: 'center',
                                        color: '#ffffff',
                                        formatter: function(value, context) {
                                            const label = data.barLabels[context.dataIndex];
                                            return label.includes('/')
                                                ? label.split('/').join('\n')
                                                : label;
                                        },
                                        font: {
                                            weight: 'bold',
                                            size: 12
                                        }
                                    }
                                }
                            },
                            plugins: [ChartDataLabels]
                        });
                    };

                    createBarChart();

                    window.addEventListener('resize', () => {
                        createBarChart();
                    });
                } catch (error) {
                    console.error("Erreur lors de la récupération des données:", error);
                }
            })
            .catch(error => console.error("Erreur lors de la récupération des données:", error));

        const chairClickableArea = document.querySelector('.chair-clickable-area');
        const tvClickableArea = document.querySelector('.tv-clickable-area');
        const recipeSection = document.getElementById('recipe');
        const recipeText = document.querySelector('.recipe-text');
        const barChartSection = document.getElementById('bar-chart');
        const skillsText = document.querySelector('.skills-text');

        if (chairClickableArea) {
            chairClickableArea.addEventListener('click', function(event) {
                event.preventDefault();
                recipeSection.style.display = 'flex';
                barChartSection.style.display = 'none';
                recipeText.style.display = 'none';
                skillsText.style.display = 'block';
                recipeSection.scrollIntoView({ behavior: 'smooth' });
            });
        }

        if (tvClickableArea) {
            tvClickableArea.addEventListener('click', function(event) {
                event.preventDefault();
                barChartSection.style.display = 'block';
                recipeSection.style.display = 'none';
                recipeText.style.display = 'block';
                skillsText.style.display = 'none';
                barChartSection.scrollIntoView({ behavior: 'smooth' });
            });
        }

        document.addEventListener('click', function(event) {
            const isClickInsideIllustration = illustrationWrapper.contains(event.target);
            if (!isClickInsideIllustration) {
                recipeSection.style.display = 'none';
                barChartSection.style.display = 'none';
                recipeText.style.display = 'block';
                skillsText.style.display = 'block';
            }
        });
    }

    if (currentPage === 'contact') {
        const setFieldState = (field, inputClass, iconClass, errorMsg) => {
            const inputElement = document.getElementById(field);
            let iconRight = inputElement.parentElement.querySelector('.icon.is-right');
            const errorElement = document.querySelector(`#${field} + .error p`);

            inputElement.classList.remove('is-success', 'is-warning', 'is-danger');
            inputElement.classList.add(inputClass);

            if (!iconRight) {
                iconRight = document.createElement('i');
                iconRight.classList.add('icon', 'is-right');
                inputElement.parentElement.appendChild(iconRight);
            }

            if (inputClass === 'is-success') {
                iconRight.classList.remove('fa-exclamation-triangle');
                iconRight.classList.add('fa', 'fa-check');
            } else if (inputClass === 'is-danger' || inputClass === 'is-warning') {
                iconRight.classList.remove('fa-check');
                iconRight.classList.add('fa', 'fa-exclamation-triangle');
            }

            if (errorMsg) {
                errorElement.textContent = errorMsg;
                errorElement.style.display = 'block';
            } else {
                errorElement.textContent = '';
                errorElement.style.display = 'none';
            }
        };

        const validateField = (field) => {
            const fieldValue = document.getElementById(field).value.trim();
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (field === 'name') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else {
                    setFieldState(field, 'is-success', 'is-success', '');
                }
            } else if (field === 'email') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else if (!emailPattern.test(fieldValue)) {
                    setFieldState(field, 'is-danger', 'is-danger', 'Invalid email address');
                } else {
                    setFieldState(field, 'is-success', 'is-success', '');
                }
            } else if (field === 'message') {
                if (fieldValue === '') {
                    setFieldState(field, 'is-danger', 'is-danger', 'This field is required');
                } else {
                    setFieldState(field, 'is-success', 'is-success', '');
                }
            }
        };

        const formIsValid = () => {
            const nameValid = document.getElementById('name').classList.contains('is-success');
            const emailValid = document.getElementById('email').classList.contains('is-success');
            const messageValid = document.getElementById('message').classList.contains('is-success');

            return nameValid && emailValid && messageValid;
        };

        const submitForm = (event) => {
            if (!formIsValid()) {
                event.preventDefault();
                alert('Please fill in all required fields correctly.');

                ['name', 'email', 'message'].forEach(field => {
                    const fieldValue = document.getElementById(field).value.trim();
                    if (fieldValue === '') {
                        setFieldState(field, 'is-warning', 'is-warning', 'This field is required');
                    }
                });
            }
        };

        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const messageField = document.getElementById('message');
        const submitButton = document.querySelector('button[type="submit"]');

        [nameField, emailField, messageField].forEach(field => {
            field.addEventListener('input', function () {
                validateField(field.id);
            });
        });

        if (submitButton) {
            submitButton.addEventListener('click', submitForm);
        }
    }
});
